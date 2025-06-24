<?php

namespace App\Http\Controllers\cms;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Seshac\Shiprocket\Shiprocket;
use Illuminate\Support\Facades\Log;
use App\Events\OrderProcessingEvent;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        // $deliveries = Delivery::with( 'order' )->latest()->paginate( 10 );
        $deliveries = Delivery::with('order')->latest();
        $deliveries = $this->filterResults($request, $deliveries);
        $deliveries = $deliveries->paginate(10);
        return view('backend.delivery.index', compact('deliveries'));
    }

    protected function filterResults($request, $deliveries)
    {
        // dd( $request->q );
        if ($request->q !== '' && !is_null($request->q)) {
            if (is_numeric($request->q)) {
                $request->validate(['q' => 'digits_between:1,40'], ['q.*' => 'Please enter proper Number']);
            } else {
                $request->validate(['q' => 'min:3']);
            }
        }
        if ($request !== null && $request->has('q') && $request['q'] !== '') {
            // dd($request->q);
            $search = $request['q'];
            $deliveries = $deliveries->where(function ($query) use ($search) {
                $query->where('order_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('shipment_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('awb_code', 'LIKE', '%' . $search . '%');
            });
        }
        if ($request !== null && $request->has('status') && $request->status !== '' && $request->status !== 'All') {
            // dd($request->status);
            $deliveries = $deliveries->where('status', '=', $request->status);
        }

        return $deliveries;
    }

    public function show($deliveryId)
    {
        $delivery = Delivery::with('order')->findOrFail($deliveryId);
        return view('backend.delivery.show', compact('delivery'));
    }

    public function create($order_id)
    {
        $order = Order::whereStatus('completed')->with('items')->findOrFail($order_id);
        if ($order->deliveries->where('status', '!=', 'Pending')->count()) {
            return redirect()->route('backend.order.show', $order_id)->with(toast('Delivery Already Created', 'info'));
        }
        foreach ($order->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with(toast('Product Quantity is less than ordered quantity', 'info'));
            }
        }
        return view('backend.order.create-delivery', compact('order'));
    }

    public function store(Request $request, $order_id)
    {
        // return redirect()->back( toast( 'Work In Progress', 'info' ) );

        $order = Order::whereStatus('completed')->with('user', 'items', 'deliveries')->findOrFail($order_id);
        if ($order->deliveries->count()) {
            return redirect()->route('backend.order.show', $order_id)->with(toast('Delivery Already Created', 'info'));
        }

        $request->validate([
            'length' => 'required|numeric|min:0.5,max:1000',
            'breadth' => 'required|numeric|min:0.5,max:1000',
            'height' => 'required|numeric|min:0.5,max:1000',
            'weight' => 'required|numeric|min:0.1|max:25'
        ]);
        // dd( $request );

        foreach ($order->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with(toast('Product Quantity is less than ordered quantity', 'info'));
            }
        }

        $packageDetails = [
            'length' => $request->length,
            'breadth' => $request->breadth,
            'height' => $request->height,
            'weight' => $request->weight
        ];

        // dd( $order->sendOrderToShiprocketApi( $packageDetails ) );
        $shiprocketOrder = $order->sendOrderToShiprocketApi($packageDetails);
        if (!$shiprocketOrder['success']) {
            return redirect()->back()->with(toast($shiprocketOrder['message'], 'error'));
        }

        $delivery = Delivery::create([
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'status' => 'Intransit',
            'length' => $request->length,
            'breadth' => $request->breadth,
            'height' => $request->height,
            'weight' => $request->weight,
            'partner_order_id' => isset($shiprocketOrder['response']['order_id']) ? $shiprocketOrder['response']['order_id'] : null,
            'shipment_id' => isset($shiprocketOrder['response']['shipment_id']) ? $shiprocketOrder['response']['shipment_id'] : null,
            // 'awb_code' => isset( $shiprocketOrder[ 'response' ][ 'awb_code' ] ) && $shiprocketOrder[ 'response' ][ 'awb_code' ] ? $shiprocketOrder[ 'response' ][ 'awb_code' ] : null,
            // 'courier_company_id' => isset( $shiprocketOrder[ 'response' ][ 'courier_company_id' ] ) && $shiprocketOrder[ 'response' ][ 'courier_company_id' ] ? $shiprocketOrder[ 'response' ][ 'courier_company_id' ] : null,
            // 'courier_name' => isset( $shiprocketOrder[ 'response' ][ 'courier_name' ] ) && $shiprocketOrder[ 'response' ][ 'courier_name' ] ? $shiprocketOrder[ 'response' ][ 'courier_name' ] : null,
            // 'partner_status_code' => isset( $shiprocketOrder[ 'response' ][ 'status_code' ] ) && $shiprocketOrder[ 'response' ][ 'status_code' ] ? $shiprocketOrder[ 'response' ][ 'status_code' ] : null,
            // 'partner_status' => isset( $shiprocketOrder[ 'response' ][ 'status_code' ] ) && isset( Order::API_STATUS[ $shiprocketOrder[ 'response' ][ 'status_code' ] ] ) ? Order::API_STATUS[ $shiprocketOrder[ 'response' ][ 'status_code' ] ] : null,
        ]);

        event(new OrderProcessingEvent($order));

        return redirect()->route('backend.delivery.index')->with(toast($shiprocketOrder['message'], 'success'));
    }

    public function edit($delivery_id)
    {
        $delivery = Delivery::findOrFail($delivery_id);
        // $order = $delivery->order;
        return view('backend.delivery.edit', compact('delivery'));
        // return view( 'backend.delivery.edit', compact( 'order', 'delivery' ) );
    }

    public function update(Request $request, $delivery_id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Intransit,Delivered,Returned',
            'delivered_date' => 'required_if:status,==,Delivered',
        ]);

        $delivery = Delivery::findOrFail($delivery_id);
        // $order = Order::findOrFail( $delivery->order_id );

        $delivery->delivered_date = $request->delivered_date;
        $delivery->status = $request->status;
        if ($delivery->save()) {
            return redirect()->route('backend.delivery.index')->with(['alert-type' => 'success', 'message' => 'Delivery Updated Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function fetchDelivery($id)
    {
        $delivery = Delivery::where('status', '!=', 'Delivered')->findOrFail($id);
        if (!$delivery->shipment_id) {
            return redirect()->back()->with(toast('Shipment Id not available', 'error'));
        }
        // dd( $delivery );
        $token = getShiprocketToken();
        $shipment = Shiprocket::shipment($token)->getSpecific($delivery->shipment_id);
        $time = now()->format('d-m-y h:is');
        Log::info('ShipRocket FetchDelivery getSpecific Response @ ' . $time);
        Log::info($shipment);

        // Get Tracking through Shipment ID
        $tracking =  Shiprocket::track($token)->throwShipmentId($delivery->shipment_id);
        // dd( $tracking );
        Log::info('ShipRocket Tracking through Shipment ID Response @ ' . $time);
        Log::info($tracking);
        $response =  Shiprocket::track($token)->throughAwb($delivery->awb_code ?? '');
        // dd( $response );
        Log::info('ShipRocket Tracking through AWB Response @ ' . $time);
        Log::info($response);

        // dd($shipment);
        if ($shipment && isset($shipment['data'])) {
            $partnerStatus = isset($shipment['data']['status']) ? Order::API_STATUS[$shipment['data']['status']] : null;

            $statusMap = [
                'Delivered' => 'Delivered',
                'In Transit' => 'Intransit',
                'Cancelled' => 'Cancelled',
            ];
            $status = $statusMap[$partnerStatus] ?? 'Pending';

            $delivery->update([
                'awb_code' => isset($shipment['data']['awb']) ? $shipment['data']['awb'] : null,
                'courier_name' => isset($shipment['data']['courier']) ? $shipment['data']['courier'] : null,
                'partner_status_code' => isset($shipment['data']['status']) ? $shipment['data']['status'] : null,
                'partner_status' => $partnerStatus,
                'pickup_token_number' => isset($shipment['data']['pickup_token_number']) ? $shipment['data']['pickup_token_number'] : null,
                'delivered_date' => isset($shipment['data']['delivered_date']) ? $shipment['data']['delivered_date'] : null,
                'status' => $status,
            ]);
            return redirect()->back()->with(toast('Delivery Fetched Successfully', 'success'));
        }
        return redirect()->back()->with(toast('Something Went Wrong', 'error'));
    }

    // public function generateAwb( $id )
    // {
    //     $delivery = Delivery::findOrFail( $id );
    //     // dd( $delivery );
    //     $token = getShiprocketToken();
    //     $generateAwbResponse = Shiprocket::courier( $token )->generateAWB( [ 'shipment_id' => $delivery->shipment_id ] );
    //     Log::info( $generateAwbResponse );

    //     if ( $generateAwbResponse->has( 'status_code' ) ) {
    //         $delivery->update( [
    //             'partner_status_code' => $generateAwbResponse[ 'status_code' ],
    //             'partner_status' => $generateAwbResponse[ 'message' ]
    // ] );
    //         // return response()->json( [ 'error' => "Your awb could not be generated. {$generateAwbResponse['message']}" ] );
    //         // return response()->json( [ 'error' => "Your awb could not be generated. {$generateAwbResponse}" ] );
    //         return redirect()->back()->with( toast( "Your awb could not be generated. {$generateAwbResponse}", 'error' ) );
    //     }

    //     if ( $generateAwbResponse->has( 'awb_assign_status' ) && $generateAwbResponse[ 'awb_assign_status' ] === 1 ) {
    //         $data = [ 'shipment_id' => $delivery->shipment_id ];
    //         $response = $delivery->prepareForPickup( $data, $token );
    //         $delivery->update( $response );
    //     }
    //     return redirect()->back()->with( toast( 'Pickup requested.', 'success' ) );
    //     // return response()->json( [ 'success' => 'Pickup requested' ] );
    // }

    // public function retryPickup( Delivery $delivery )
    // {
    //     $token = getShiprocketToken();

    //     $data = [ 'shipment_id' => $delivery->shipment_id ];
    //     $response = $delivery->prepareForPickup( $data, $token );
    //     $delivery->update( $response );
    //     Log::info( 'retry pickup' );
    //     Log::info( $response );

    //     return redirect()->back()->with( toast( 'Pickup requested.', 'success' ) );
    // }

    public function printManifest($id)
    {
        $token = getShiprocketToken();

        $res = Shiprocket::generate($token)->printManifest(['order_ids' =>  [$id]]);
        // dd( $res );
        if ($res['manifest_url']) {
            $res = $res['manifest_url'];
        } else {
            return redirect()->back()->with(toast('Manifest Not Available', 'error'));
        }

        header('Content-type:application/pdf');
        header('Content-Disposition:attachment;filename=manifest.pdf');
        return readfile($res);
    }

    public function printLabel($id)
    {
        $token = getShiprocketToken();

        $res = Shiprocket::generate($token)->label(['shipment_id' => [$id]]);
        if ($res['label_created']) {
            $res = $res['label_url'];
        } else {
            return redirect()->back()->with(toast('Label Not Available', 'error'));
        }

        header('Content-type:application/pdf');
        header('Content-Disposition:attachment;filename=label.pdf');
        return readfile($res);
    }
}
