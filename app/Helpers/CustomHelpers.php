<?php

use App\Models\Tag;
use App\Models\Cart;
use App\Models\Product;
use Seshac\Shiprocket\Shiprocket;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;



/**
 * Default date time format
 */

if (!function_exists('dd_format')) {
    function dd_format($value, $format = 'd-m-Y h:i a')
    {
        return date($format, strtotime($value));
    }
}

if (!function_exists('tableRowSrNo')) {

    function tableRowSrNo($index, $paginator)
    {
        return $index + 1 + (($paginator->currentPage() - 1) * $paginator->perPage());
        // return $index + 1 + (($paginator->resolveCurrentPage() - 1) * $paginator->perPage());
    }
}

if (!function_exists('str_limit')) {
    function str_limit($title, $value = 21)
    {
        return \Illuminate\Support\Str::limit($title, $value, '...');
    }
}

if (!function_exists('gst')) {
    /**
     ** GST Calculator
     * @param float $value original amount
     * @param string $mode (inc, exc) tax inclusive or exclusive
     * @return array
     */
    function gst(float $value, $mode = 'inc'): array
    {
        $cgstPerc = (int)config('app.cgst');
        $sgstPerc = (int)config('app.sgst');
        // $cgstPerc = config('app.cgst');
        // $sgstPerc = config('app.sgst');
        $gstPerc = $cgstPerc + $sgstPerc;
        if ($mode === 'exc') {
            return [
                'cgst' => number_format(($value * $cgstPerc) / 100, 2),
                'sgst' => number_format(($value * $sgstPerc) / 100, 2),
                'total' => number_format(($value * $gstPerc) / 100, 2),
            ];
        }
        $new_total = $value - number_format(($value - ($value * (100 / (100 + $gstPerc)))), 2);
        return [
            'cgst' => number_format(((($cgstPerc / 100) * $new_total)), 2),
            'sgst' => number_format(((($sgstPerc / 100) * $new_total)), 2),
            'total' => number_format(($value - ($value * (100 / (100 + $gstPerc)))), 2),
        ];
        // $total_gst_amount= number_format(($value - ($value * (100 / (100 + $gstPerc)))), 2);
        // return [
        //     'cgst' => number_format(($value - ($value * (100 / (100 + $cgstPerc)))), 2),
        //     'sgst' => number_format(($value - ($value * (100 / (100 + $sgstPerc)))), 2),
        //     'total' => number_format(($value - ($value * (100 / (100 + $gstPerc)))), 2),
        // ];
    }
}

if (!function_exists('amt')) {

    /**
     * The function "amt" converts an amount from cents to dollars.
     *
     * @param amount The parameter "amount" is a numeric value representing a monetary amount.
     *
     * @return the amount divided by 100, casted as an integer.
     */
    function amt($amount)
    {
        return (int)$amount / 100;
    }
}


if (!function_exists('toast')) {
    /**
     ** Toastr alerts
     * @param string $message
     */
    function toast($message, $type = 'success')
    {
        return [
            "message" => $message,
            "alert-type" => $type,
        ];
    }
}

if (!function_exists('getPreviousRoute')) {
    /**
     ** remove "00" suffix from amount returned by api and convert to int
     * @param string $amount
     * @return int
     */
    function getPreviousRoute()
    {
        return app('router')->getRoutes(url()->previous())->match(app('request')->create(url()->previous()))->getName();
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $location, $quality = 90)
    {
        $fileWithExt = $file;
        $extension = $fileWithExt->clientExtension();
        $filename =  date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
        $destinationPath = storage_path('app/public/' . $location . '/');
        if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
            $coverImg = Image::make($fileWithExt->getRealPath())->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $coverImg->orientate();
            $coverImg->save($destinationPath . $filename, $quality);
            $extension = 'image';
        } else {
            Storage::disk('public')->put($location . '/' . $filename,  file_get_contents($fileWithExt));
        }
        return ['filename' => $filename, 'type' => $extension];
    }
}

if (!function_exists('getYoutubeEmbedUrl')) {

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
        $youtube_id = '';
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
if (!function_exists('highlightHeading')) {

    function highlightHeading($s)
    {
        $s = str_replace("(", "<span class='featured text-primary'>", $s);
        $s = str_replace(")", "</span>", $s);
        return $s;
    }
}
if (!function_exists('replaceBracket')) {

    function replaceBracket($s)
    {
        $s = str_replace("(", "", $s);
        $s = str_replace(")", "", $s);
        return $s;
    }
}

/**
 *  Generate 8 character random string
 */

if (!function_exists('struniq')) {
    function struniq()
    {
        return substr(uniqid(), 11) . rand(10, 99) . substr(strtotime(now()), 6);
    }
}

if (!function_exists('getShiprocketToken')) {
    function getShiprocketToken()
    {
        $configToken = App\Models\ShiprocketConfig::where('name', 'token')->where('validity', '>', now())->first();
        // dd($configToken);
        if ($configToken) {
            $token = decrypt($configToken->value);
        } else {
            $token =  Shiprocket::getToken() ?? null;
            if ($token) {
                $configToken = App\Models\ShiprocketConfig::updateOrCreate(
                    ['name' => 'token'],
                    [
                        'value' => encrypt($token),
                        'validity' => Carbon\Carbon::now()->addHours(9)
                    ]
                );
            }
        }
        return $token ?? '';
    }
}

if (!function_exists('generateOrderNo')) {
    function generateOrderNo()
    {
        do {
            $order_no = 'ord_' . now()->format('dmyhis') . rand(10, 99);
        } while (App\Models\Order::where('order_no', $order_no)->exists());

        return $order_no;
    }
}

if (!function_exists('getUserCart')) {
    function getUserCart()
    {
        $user = auth()->user();
        if ($user) {
            $cart = Cart::updateOrCreate([
                'user_id' => $user->id
            ]);
        } else {
            $cart_session_id = session()->get('cart_session_id');
            if (!$cart_session_id) {
                $cart_session_id = now()->format('dmyhis') . rand(100, 999);
                session()->put('cart_session_id', $cart_session_id);
            }
            $cart = Cart::updateOrCreate([
                'session_id' => $cart_session_id
            ]);
        }
        return $cart;
    }
}
