<?php

namespace App\Lib\Webhook;

use App\Models\Plan;
use App\Traits\Taxable;
use App\Traits\Transactional;

class Webhook {
    use Transactional, Taxable;
    protected $class;
    protected $status;
    public static $plan;
    protected $event;

    public function __construct(string $event)
    {
        $this->event = $event;
        $explodeEvent = explode('.', $this->event);
        $this->class = ucfirst($explodeEvent[0]);
        $this->status = $explodeEvent[1];
    }

    public function getEntity(): string
    {
        return __NAMESPACE__.'\\'.$this->class;
    }

    public function manage($payload)
    {
        $status = $this->status;
        // if ($this->event === 'subscription.charged') {
        //     $payload = $this->formatPayload($payload);
        //     self::$plan = Plan::where('plan_id', $payload['subscription']['plan_id'])
        //         ->first(['id', 'amount']);
        //     return $this->getEntity()::$status($payload);
        // }

        // $payload = isset($payload['subscription']) ? $payload['subscription']['entity'] : $payload['payment']['entity'];
        $payload = $payload['payment']['entity'];
        return $this->getEntity()::$status($payload)/* . '::'. $status()*/;
    }

    // public static function createSi($id, $status = 'charged')
    // {
    //     return ModelsSiData::create(['sub_id' => $id, 'status' => $status]);
    // }

    // public static function createOrder($subId, $amount, $options = [], $userId = null) : ModelsOrder
    // {
    //     $options['discount_amount'] = $options['discount_amount'] ?? 0;
    //     return ModelsOrder::create([
    //         'subscription_id' => $subId,
    //         'api_order_id' => $options['api_order_id'] ?? null,
    //         'user_id' => $userId ?? Auth::guard('api')->id(),
    //         'total_amount' => $amount - $options['discount_amount'],
    //         'discount_amount' => $options['discount_amount'],
    //         'status' => $options['status'] ?? 'completed',
    //     ]);
    // }

    // public static function createOrderItems($planId, $orderId, $amount, $disc = 0) : OrderItem
    // {
    //     $gst = gst($amount);
    //     $baseAmount = $amount - $gst['total'];
    //     $taxable = max(0, $baseAmount - $disc);
    //     $gst = gst($taxable, 'exc');
    //     return OrderItem::create([
    //         'package_id' => $planId,
    //         'order_id' => $orderId,
    //         'amount' => $baseAmount,
    //         'taxable_amount' => $taxable,
    //         'cgst_percent' => config('app.cgst'),
    //         'sgst_percent' => config('app.sgst'),
    //         'cgst' => $gst['cgst'],
    //         'sgst' => $gst['sgst'],
    //     ]);
    // }

    // public static function createTransaction($data)
    // {
    //     return Transaction::create($data);
    // }

    // public static function createInvoice($data)
    // {
    //     return Invoice::create($data);
    // }

    /**
     * @param $payload
     * @return \Illuminate\Support\Collection
     */
    protected function formatPayload($payload): \Illuminate\Support\Collection
    {
        $subscription = $payload['subscription']['entity'];
        $payment = $payload['payment']['entity'];
        $payload = collect([
            'subscription' => $subscription,
            'payment' => [
                'pg_payment_id' => $payment['id'],
                'pg_payment_method' => $payment['method'],
                'pg_payment_status' => $payment['status'],
                'order_id' => $payment['order_id'],
                'amount' => $payment['amount'],
            ]
        ]);
        return $payload;
    }
}
