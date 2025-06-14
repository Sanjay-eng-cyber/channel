<?php

namespace App\Lib\Webhook;

use App\Models\Transaction;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Payment extends Webhook
{
    public static function authorized($payload)
    {
        $order  = Order::where('api_order_id', $payload['order_id'])->first('id');
        $payload['order_id'] = $order->id;
        Transaction::create(self::format($payload)->toArray());
        return 'payment.autorized';
    }

    public static function failed($payload)
    {
        $order  = Order::where('api_order_id', $payload['order_id'])->first('id');
        $payload['order_id'] = $order->id;
        $trans = Transaction::where('pg_payment_id', $payload['id'])->first();

        if ($trans !== null) {

            self::updateTransaction($payload);
        } else {

            Transaction::create(self::format($payload, 'failed')->toArray());
        }

        $order->update(['status' => 'failed']);
        // User::find($order->user_id)->alert('failed');
        return 'payment.failed';
        // return respondWithError(ApiCode::SERVICE_FAILURE, 401, ['more_info' => $payload]);
    }

    public static function captured($payload)
    {
        // dd($payload);
        $payloadOrderId = $payload['order_id'];
        $order  = Order::where('api_order_id', $payload['order_id'])->select('id', 'user_id')->first();
        $trans = Transaction::where('pg_payment_id', $payload['id'])->first();


        DB::transaction(function () use ($payload, $order, $payloadOrderId, $trans) {

            if ($trans !== null) {

                self::updateTransaction($payload);
            } else {

                $payload['order_id'] = $order->id;
                Transaction::create(self::format($payload)->toArray());
                $payload['order_id'] = $payloadOrderId;
            }

            self::createInvoice([
                'invoice_id' => $payload['invoice_id'],
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'invoice_date' => now()
            ]);
        });
    }

    /**
     * @param $payload
     * @return \Illuminate\Support\Collection
     */
    protected static function format($payload, $status = 'completed'): \Illuminate\Support\Collection
    {
        $payload['amount'] = amt($payload['amount']);
        $payload = collect([
            'pg_payment_id' => $payload['id'],
            'payment_type' => $payload['method'],
            'pg_payment_status' => $payload['status'],
            'order_id' => $payload['order_id'] ?? null,
            'amount' => $payload['amount'],
            'status' => $status,
        ]);
        return $payload;
    }

    /**
     * @param $si
     * @param $payload
     */
    // protected static function processSubscription($payload): void
    // {
    //     $order = Order::where('api_order_id', $payload['order_id'])->first();

    //     $newSub = Subscription::start($order->model_id, ['user_id' => $order->user_id]);
    //     User::find($order->user_id)->alert('activated');
    //     self::createInvoice([
    //         'invoice_id' => $payload['invoice_id'],
    //         'subscription_id' => $newSub->id,
    //         'user_id' => $order->user_id,
    //         'order_id' => $order->id,
    //     ]);

    //     $order->update(['subscription_id' => $newSub->id]);
    // }

    private static function updateTransaction($payload)
    {
        Transaction::where('pg_payment_id', $payload['id'])->update(['pg_status' => $payload['status']]);
    }
}
