<?php

namespace App\Models;

use Seshac\Shiprocket\Shiprocket;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public const API_STATUS = [
        1 => "Awb Assigned",
        2 => "Label Generated",
        3 => "Pickup Scheduled/Generated",
        4 => "Pickup Queued",
        5 => "Manifest Generated",
        6 => "Shipped",
        7 => "Delivered",
        8 => "Cancelled",
        9 => "RTO Initiated",
        10 => "RTO Delivered",
        11 => "Pending",
        12 => "Lost",
        13 => "Pickup Error",
        14 => "RTO Acknowledged",
        15 => "Pickup Rescheduled",
        16 => "Cancellation Requested",
        17 => "Out For Delivery",
        18 => "In Transit",
        19 => "Out For Pickup",
        20 => "Pickup Exception",
        21 => "Undelivered",
        22 => "Delayed",
        23 => "Partial_Delivered",
        24 => "Destroyed",
        25 => "Damaged",
        26 => "Fulfilled",
        38 => "Reached at Destination",
        39 => "Misrouted",
        40 => "RTO NDR",
        41 => "RTO OFD",
        42 => "Picked Up",
        43 => "Self Fulfilled",
    ];

    public function prepareOrder($params): array
    {
        $items = [];
        $user = User::find($this->user_id);
        // dd($this);
        // $payment_method = 'COD';
        $payment_method = 'Prepaid';

        foreach ($this->items as $item) {
            $items[$item->product->name] = [
                'name' => $item->product->name,
                'sku' => $item->product->sku,
                'units' => $item->quantity,
                'selling_price' => $item->amount,
                "hsn" => 000000
            ];
        }
        // dd($items);

        return [
            'order_id' => $this->order_no,
            'order_date' => $this->created_at ?? now(),
            'pickup_location' => 'Primary',
            "billing_customer_name" => $this->address_name,
            "billing_last_name" => '',
            "billing_address" => $this->street_address,
            "billing_address_2" => $this->landmark,
            "billing_city" => $this->city,
            "billing_pincode" => $this->postal_code,
            "billing_state" => $this->state,
            "billing_country" => $this->country ?? "India",
            "billing_email" => $user->email,
            "billing_phone" => $user->phone,
            "shipping_is_billing" => true,
            "order_items" => $items,
            "payment_method" => $payment_method,
            "shipping_charges" => 0,
            "giftwrap_charges" => 0,
            "transaction_charges" => 0,
            "total_discount" => 0,
            "sub_total" => $this->total_amount,
            "length" => $params['length'],
            "breadth" => $params['breadth'],
            "height" => $params['height'],
            "weight" => $params['weight']
        ];
    }

    public function sendOrderToShiprocketApi($params)
    {
        $token = getShiprocketToken();
        // dd($token);

        $checkServiceability = Shiprocket::courier($token)->checkServiceability([
            'pickup_postcode' => env('APP_POSTAL_CODE'),
            'delivery_postcode' => $this->postal_code,
            'weight' => $params['weight'],
            'cod' => 0
        ]);
        // dd($checkServiceability);
        Log::info('Check Serviceability');
        Log::info($checkServiceability);

        if ($checkServiceability['status']  !== 200) {
            session()->flash('error', 'Not deliverable in this location');
            return  [
                'success' => false,
                'message' => "Not deliverable in given location"
            ];
        }
        $details = $this->prepareOrder($params);
        // dd($details);

        $response = Shiprocket::order($token)->create($details);
        Log::info('Order Create');
        Log::info($response);
        // dd($response);
        if ($response['status_code'] === 422) {
            Log::info('Order Create Code 422');
            // foreach ($response['errors'] as $key => $err) {
            //     $string = str_replace(['order_items', '.'], ['', ' '], $key);
            //     session()->flash('error', "{$string}: $err[0]");
            // }
            return [
                'success' => false,
                'message' => "Something went wrong while creating order"
            ];
        }

        if ($response['status_code'] === 1) {
            Log::info('Order Create Success');

            return [
                'success' => true,
                'message' => "Shiprocket Order Created Successfully",
                'response' => $response
            ];
        } else {
            Log::info('Order Create Error');
            return [
                'success' => false,
                'message' => "Something went wrong while creating order."
            ];
        }

        // to assign awb number
        // $response = $this->generateAWB($token, $response);

        // $this->storeShiprocketData($response);

        // return [
        //     'success' => true,
        //     'message' => 'Delivery Updated'
        // ];
    }

    public function storeShiprocketData($shiprocketDetails): void
    {

        Log::info('Storing Shiprocket Details Data');
        Log::info($shiprocketDetails);
        $this->update([
            'partner_order_id' => $shiprocketDetails['order_id'],
            'shipment_id' => $shiprocketDetails['shipment_id'],
            'awb_code' => $shiprocketDetails['awb_code'] ?: null,
            'courier_company_id' => $shiprocketDetails['courier_company_id'] ?: null,
            'courier_name' => $shiprocketDetails['courier_name'] ?: null,
            'partner_status_code' => $shiprocketDetails['status_code'],
            'partner_status' => self::API_STATUS[$shiprocketDetails['status_code']] ?? null,
            'pickup_status' => $shiprocketDetails['pickup_data']['pickup_status'] ?? null,
            'pickup_date' => $shiprocketDetails['pickup_data']['pickup_scheduled_date'] ?? null,
            'pickup_token_number' => $shiprocketDetails['pickup_data']['pickup_token_number'] ?? null,
            'message' => $shiprocketDetails['pickup_data']['message'] ?? null
        ]);
    }
}
