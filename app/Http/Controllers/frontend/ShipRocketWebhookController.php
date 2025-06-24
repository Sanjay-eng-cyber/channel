<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Events\OrderDeliveredEvent;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ShipRocketWebhookController extends Controller
{
    public function manage(Request $request)
    {
        $time = now()->format('d-m-y h:is');
        Log::info('ShipRocket Webhook Response @ ' . $time);
        Log::info($request);
        Log::info('Headers: ', $request->headers->all());

        if ($request->header('x-api-key') !== config('shiprocket.credentials.shiprocket_webhook_secret')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $awb = $request->awb;
        $courierName = $request->courier_name;
        $partnerStatusId = $request->shipment_status_id;
        $partnerStatus = $request->shipment_status;
        $orderId = $request->order_id;
        $scans = $request->scans;

        $scansJson = json_encode($scans);

        $statusMap = [
            'DELIVERED' => 'Delivered',
            'In Transit' => 'Intransit',
            'CANCELLED' => 'Cancelled',
        ];
        $status = $statusMap[$partnerStatus] ?? 'Pending';

        $deliveredDate = null;
        if ($partnerStatus === "DELIVERED") {
            foreach ($scans as $scan) {
                if ($scan['activity'] === "SHIPMENT DELIVERED") {
                    $deliveredDate = $scan['date'];
                    break;
                }
            }
            $delivery = Delivery::where('partner_order_id', $orderId)->first();
            if ($delivery) {
                $order = Order::with('user')->find($delivery->order_id);
                event(new OrderDeliveredEvent($order));
            }
        }

        Delivery::where('partner_order_id', $orderId)->update([
            'awb_code' => $awb,
            'courier_name' => $courierName,
            'partner_status_code' => $partnerStatusId,
            'partner_status' => $partnerStatus,
            'delivered_date' => $deliveredDate,
            'status' => $status,
            'scans' => $scansJson
        ]);
        return response()->json(['success' => 'Details Updated']);
    }
}
