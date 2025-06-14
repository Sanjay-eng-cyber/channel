<?php

namespace App\Lib\MSG91;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MSG91
{
    public const URL = 'https://api.msg91.com/api/v5/';


    public const STATUS_CODE = [
        "505" => "Demo account",
        "418" => "IP not whitelisted",
        "200" => "Ok",
        "101" => "Missing mobile no.",
        "102" => "Missing message",
        "103" => "Missing sender ID",
        "105" => "Missing password",
        "106" => "Missing Authentication Key",
        "107" => "Missing Route",
        "202" => "Invalid mobile number. You must have entered either less than 10 digits or there is an alphabetic character in the mobile number field in API.",
        "203" => "Invalid sender ID. Your sender ID must be 6 characters, alphabetic.",
        "207" => "Invalid authentication key. Crosscheck your authentication key from your account’s API section.",
        "208" => "IP is blacklisted. We are getting SMS submission requests other than your whitelisted IP list.",
        "301" => "Insufficient balance to send SMS",
        "302" => "Expired user account. You need to contact your account manager.",
        "303" => "Banned user account",
        "306" => "This route is currently unavailable. You can send SMS from this route only between 9 AM - 9 PM.",
        "307" => "Incorrect scheduled time",
        "308" => "Campaign name cannot be greater than 32 characters",
        "309" => "Selected group(s) does not belong to you",
        "310" => "SMS is too long. System paused this request automatically.",
        "311" => "Request discarded because same request was generated twice within 10 seconds"
    ];


    public static function sendOTP($param)
    {
        $param['otp_expiry'] = $param['otp_expiry'] ?? 10;
        return static::setup('sendotp', $param);
    }

    public static function resendOTP($param)
    {
        $param['otp_expiry'] = $param['otp_expiry'] ?? 5;
        return static::setup('resendotp', $param);
    }

    public static function verifyOTP($param)
    {
        $param['otp_expiry'] = $param['otp_expiry'] ?? 5;
        return static::setup('verify', $param);
    }
    public static function sms($param)
    {
        $url = 'https://api.msg91.com/api/v5/flow';
        return Http::post($url, [
            "sender" => config('msg91.sender_id'),
            "country" => config('msg91.country'),
            "authkey" => config('msg91.auth_key'),
            // 'email' => config('msg91.sender_email'),
            'flow_id' => $param['flow_id'],
            "mobiles" => $param['mobile'],
            // 'days'   => $param['days'],
        ])->json();
    }

    public static function sendBulkSms($param)
    {
        return Http::post("https://api.msg91.com/api/v2/sendsms", [
            "sender" => config('msg91.sender_id'),
            "route" => config('msg91.route'),
            "country" => config('msg91.country'),
            "sms" => [
                [
                    "message" => $param["msg"],
                    "to" => $param["mobiles"]
                ]
            ],
            "authkey" => config('msg91.auth_key')
        ])->json();
    }


    private static function setup($action, $param)
    {

        $param['authkey'] = $param['authkey'] ?? config('msg91.auth_key');
        $param['sender'] = $param['sender'] ?? config('msg91.sender_id');
        $param['country'] = $param['country'] ?? config('msg91.country');
        $param['route'] = $param['route'] ?? config('msg91.route');
        $sms = ["sendotp" => "otp?", "resendotp" => "otp/resend?", "verify" => "otp/verify?", "sms" => "sendhttp.php"];
        if (!array_key_exists($action, $sms)) {
            return (["success" => false, "message" => "invalid request"]);
        }
        $url = ($param['url'] ?? self::URL) . $sms[$action];
        unset($param['url']);

        try {
            $client = new Client(); //GuzzleHttp\Client
            $response = $client->post($url, [
                'form_params' => $param
            ]);
        } catch (\Throwable $th) {
            return (["success" => false, "message" => $th->getMessage()]);
        }
        if ($response->getStatusCode() == 200) {

            $data = json_decode($response->getBody());
            // return $data;
            if ($data) {
                return static::checkResponse($data);
            } else {
                return (["success" => true, "message" => 'success']);
            }
        } else {
            return (["success" => false, "message" => $response->message]);

            // return ['type' => "error", "message" => "fail to send!"];
        }
    }


    public static function checkResponse($response)
    {


        if (isset($response->type)) {
            try {

                if (gettype($response) != 'object' || gettype($response) != 'array') {
                    return (["success" => true, "message" => ($response ?? 'success')]);
                } elseif (strtolower($response->type) == "success") {
                    return (["success" => true, "message" => ($response->message ?? 'success')]);
                } else if (strtolower($response->message) == "success") {
                    return (["success" => true, "message" => $response->type]);
                }
                if (strtolower($response->type) == "error") {
                    return (["success" => false, "message" => ($response->message ?? 'Failed')]);
                } else if (strtolower($response->message) == "error") {
                    return (["success" => false, "message" => $response->type]);
                } else {
                    return (["success" => false, "message" => ($response->message ?? 'success')]);
                }
            } catch (\Throwable $th) {
                return (["success" => false, "message" => ('Failed')]);
            }
        } else {
            return (["success" => false, "message" => ('Failed')]);
        }
    }
}
