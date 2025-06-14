<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Lib\Razorpay\Razorpay;
use App\Lib\Webhook\Webhook;
use Illuminate\Http\Request;
use Razorpay\Api\Errors\SignatureVerificationError;

class WebhookController extends Controller
{
    public function manage(Request $request, Razorpay $api)
    {
        $api->verifySignature($request->getContent(), $request->header('X_RAZORPAY_SIGNATURE'), env('WEBHOOK_SECRET'));
        $webhook = new Webhook($request->event);
        return $webhook->manage($request->payload);

    }
}
