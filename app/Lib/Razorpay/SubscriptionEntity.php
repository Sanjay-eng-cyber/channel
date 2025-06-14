<?php

namespace App\Lib\Razorpay;

use Razorpay\Api\Subscription;
class SubscriptionEntity extends Subscription
{
    protected $baseUrl = 'subscriptions/';
    protected $id;

    public function pause($attributes = [])
    {
        $this->id = $attributes['sub_id'];
        unset($attributes['sub_id']);
        $relativeUrl = $this->baseUrl . $this->id . '/pause';
        return $this->request('POST', $relativeUrl, $attributes);
    }

    public function resume($sub_id, $attributes = [])
    {
        $this->id = $sub_id;
        $relativeUrl = $this->baseUrl . $this->id . '/resume';
        return $this->request('POST', $relativeUrl, $attributes);
    }

    public function update($sub_id, $attributes = [])
    {
        $this->id = $sub_id;
        $relativeUrl = $this->baseUrl . $this->id;
        return $this->request('PATCH', $relativeUrl, $attributes);
    }
}
