<?php

namespace App\Traits;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Plan;
use App\Models\SiData;
use App\Models\Transaction;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;

trait Transactional
{
    /**
     * @param float $amount
     * @param array $options
     * @return Order
     */
    public static function createOrder(float $amount, array $options = [], $selectedAddress): Order
    {
        $options['discount_amount'] = $options['discount_amount'] ?? 0;

        return Order::create([
            'api_order_id' => $options['api_order_id'] ?? null,
            'user_id' => $options['user_id'] ?? Auth::id(),
            'sub_total' => $amount,
            'discount_amount' => $options['discount_amount'],
            'total_amount' => $amount - $options['discount_amount'],
            'status' => $options['status'] ?? 'initial',
            'street_address' => $selectedAddress->street_address,
            'landmark' => $selectedAddress->landmark,
            'city' => $selectedAddress->city,
            'state' => $selectedAddress->state,
            'country' => $selectedAddress->country,
            'postal_code' => $selectedAddress->postal_code,
        ]);
    }

    /**
     * @param int $planId
     * @param int $orderId
     * @param float $amount
     * @param float|int $disc
     * @return OrderItem
     */
    public static function createOrderItems(Order $order, $cartItems)
    {
        // dd($cartItems);
        foreach ($cartItems as $cartItem) {
            [$gst, $baseAmount, $taxable] = self::extracted($cartItem->product->final_price, $order->discount_amount);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'quantity' => $cartItem->quantity,
                'taxable_amount' => $taxable,
                'cgst_percent' => config('app.cgst'),
                'cgst' => $gst['cgst'],
                'sgst_percent' => config('app.sgst'),
                'sgst' => $gst['sgst'],
                'amount' => $baseAmount,
            ]);
        }
    }

    public static function createSi($data)
    {
        return SiData::create([
            'sub_id' => $data['id'],
            'user_id' => auth()->id(),
            'total_count' => $data['total_count'],
            'paid_count' => $data['paid_count'],
            'customer_id' => $data['customer_id'] ?? null,
            'remaining_count' => $data['remaining_count'],
            'status' => $data['status']
        ]);
    }

    public static function createTransaction($data): void
    {
        Transaction::create($data);
    }

    public static function createInvoice($data): void
    {
        Invoice::create($data);
    }

    public static function updateOrder(Order $order, int $amount, int $discount, $newSub, $si): void
    {
        $order->update([
            'total_amount' => $amount,
            'discount_amount' => $discount,
            'subscription_id' => $newSub->id,
            'user_id' => $si->user_id,
            'status' => 'completed'
        ]);
        // dd($order);
    }

    public static function updateItem(Order $order, $amount): void
    {
        [$gst, $baseAmount, $taxable] = self::extracted($amount, $order->discount_amount);
        $order->item->update([
            'amount' => $baseAmount,
            'taxable_amount' => $taxable,
            'cgst_percent' => config('app.cgst'),
            'sgst_percent' => config('app.sgst'),
            'cgst' => $gst['cgst'],
            'sgst' => $gst['sgst'],
        ]);
    }

    public static function __callStatic($method, $arguments)
    {
        if (!method_exists(__CLASS__, $method)) {
            throw new \BadMethodCallException(sprintf('method "%s" does not exist', $method));
        }

        return (self::Transactional)->$method(...$arguments);
    }
}
