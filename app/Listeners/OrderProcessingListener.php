<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use App\Mail\OrderProcessingMail;
use Illuminate\Support\Facades\Mail;
use App\Events\OrderProcessingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcessingListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public $delay = 120;

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderProcessingEvent  $event
     * @return void
     */
    public function handle(OrderProcessingEvent $event)
    {
        $order = $event->order;
        $productsNameArray = $order->items()->with('product')->get()->pluck('product.name')->toArray();
        $productsName = implode(", ", $productsNameArray);

        if ($order->user->email) {
            Mail::to($order->user->email)->send(new OrderProcessingMail($order, $productsNameArray));
        }

        if (app()->env == 'production' && $order->user->phone) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_order_processing_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $order->user->phone,
                "USER" => str_limit($order->user->first_name, 27),
                "PRODUCTNAME" => str_limit($productsName, 27),
                "EMAIL" => config('app.enquiry_email'),
            ]);
            // dd($res);
        }
    }
}
