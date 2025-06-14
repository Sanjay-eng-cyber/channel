<?php

namespace App\Lib\Razorpay;

use Razorpay\Api\Api;
use Razorpay\Api\Errors\BadRequestError;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay
{
    protected $api;
    protected $currency = "INR";
    /**
     * @var string
     */
    private $key;

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->api = new Api($this->key, $secret);

    }

    public function getKeyId(): string
    {
        return $this->key;
    }

    /**
     * Verify Webhook Signature
     * @param $body string Request body
     * @param $signature string Webhook header X_RAZORPAY_SIGNATURE
     * @return \Exception|\Illuminate\Support\Collection|SignatureVerificationError
     */
    public function verifySignature(string $body, string $signature)
    {
        // try {
            return collect($this->api->utility->verifyWebhookSignature($body, $signature, config('razorpay.webhook_secret')));
        // } catch (SignatureVerificationError $e){
        //     return $e;
        // }
    }

    public function createPlan($plan): \Illuminate\Support\Collection
    {
        return collect($this->api->plan->create($plan));
    }

    public function createOrder(int $amount, string $currency = null)
    {
        $this->currency = $currency ?: $this->currency;
        // try {
            return collect($this->api->order->create(['amount' => "{$amount}", 'currency' => $this->currency]));
        // } catch (BadRequestError $e){
        //     return $e;
        // }
    }

    public function fetchAllOrder()
    {
        return collect($this->api->order->all())['items'];
    }

    public function fetchOrder(string $id): \Illuminate\Support\Collection
    {
        return collect($this->api->order->fetch($id));
    }

    public function pauseSubscription(string $subId)
    {
        //! Only subscriptions in the `active` state can be paused.
        //** If you pause a subscription in the authenticated state, the subscription goes to the cancelled state.
        // try {
            return collect((new SubscriptionEntity)->pause(['sub_id' => $subId, 'pause_at' => 'now']));
        // } catch (BadRequestError $e){
        //     return $e;
        // }

    }

    public function resumeSubscription(string $subId)
    {
        //** Can only resume if sub is in `paused` state
        // try {
            return collect((new SubscriptionEntity)->resume($subId, ['resume_at' => 'now']));
        // } catch (BadRequestError $e){
        //     return $e;
        // }

    }

    public function createSubscription($plan_id, $offer_id = null)
    {
        // try {
            return collect($this->api->subscription->create([
                'plan_id' => $plan_id,
                'customer_notify' => 1,
                'total_count' => 120,
                'offer_id' => $offer_id,
                'addons' => [
                    ['item' => null]
                ]
            ]));
        // } catch (BadRequestError $e){
        //     return $e;
        // }
    }

    public function updateSubscription($sub_id, $plan_id)
    {
        try {
            return collect((new SubscriptionEntity)->update($sub_id, ['plan_id' => $plan_id]));
        } catch (BadRequestError $e){
            return $e;
        }
    }

    public function fetchInvoice(string $id)
    {
        try {
            return collect($this->api->invoice->fetch($id));
        } catch (BadRequestError $e){
            return $e;
        }
    }

    public function capturePayment(string $paymentId, int $amount)
    {
        try {
            return collect($this->api->payment->fetch($paymentId)->capture(array('amount'=> $amount)));
        } catch (BadRequestError $e){
            return $e;
        }
    }

    public function cancelSubscription($id, $cancelAtEnd = true)
    {
        try {
            return collect($this->api->subscription->fetch($id)->cancel(['cancel_at_cycle_end' => $cancelAtEnd]));
        } catch (BadRequestError $e){
            return $e;
        }
    }

    public function __call($function, $arguments)
    {
        if ( !method_exists($this, $function) ) {
            throw new \BadMethodCallException(sprintf('method "%s" does not exist', $function));
        }
        call_user_func_array($function, (array)implode(', ', $arguments));
    }

    public static function __callStatic($function, $arguments)
    {
        if ( !method_exists(__CLASS__, $function) ) {
            throw new \BadMethodCallException(sprintf('method "%s" does not exist', $function));
        }
        call_user_func_array($function, (array)implode(', ', $arguments));
    }
}
