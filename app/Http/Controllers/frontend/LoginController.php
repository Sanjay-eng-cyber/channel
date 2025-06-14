<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\User;
use App\Lib\MSG91\MSG91;
use App\Lib\MSG91\SMSCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'reset');
    }

    public function loginShow()
    {
        // return view('frontend.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['phone' => 'required|digits:10']);
        // dd($request);
        // $otp = MSG91::sendOTP([
        //     'mobile' => config('msg91.country') . $request->phone,
        //     "message" =>  Lang::get(config('msg91.map')[SMSCode::SEND_OTP]),
        //     "template_id" => SMSCode::SEND_OTP,
        // ]);

        // if ($otp['message']->type !== 'success') {
        //     return response()->json(['success' => false, 'message' => 'There was an error sending otp']);
        // }

        // return response()->json(['success' => false, 'message' => 'There was an error sending otp']);
        return response()->json(['success' => true, 'phone' => $request->phone, 'message' => 'OTP Sent']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['phone' => 'required|digits:10', 'otp' => 'required|numeric']);

        // $verify = MSG91::verifyOTP([
        //     "mobile" => config('msg91.country') . request("phone"),
        //     "otp" => request("otp"),
        //     "country" => 91,
        // ]);

        // if ($verify['message']->type === 'success') {
        //     return response()->json(['success' => true, 'message' => 'Otp verified']);
        // }

        if ($request->otp == '1234') {
            $user = User::firstOrCreate(
                ['phone' => $request->phone],
                ['created_at' => now(), 'updated_at' => now()]
            );
            if ($user) {
                Auth::guard('web')->login($user);
                $redirect_url = session()->get('url.intended') ?? route('frontend.index');
                $cartSessionId = session()->get('cart_session_id');
                // dd($cartSessionId);
                if ($cartSessionId) {
                    $cart = Cart::updateOrCreate([
                        'user_id' => $user->id
                    ]);

                    $sessionCart = Cart::where('session_id', '!=', null)->where('session_id', $cartSessionId)->first();
                    $sessionCartItems = $sessionCart ? $sessionCart->items()->get() : [];
                    foreach ($sessionCartItems as $item) {
                        if (!$cart->items()->where('product_id', $item->product_id)->exists()) {
                            $item->update(['cart_id' => $cart->id]);
                        } else {
                            $item->delete();
                        }
                    }
                    optional($sessionCart->delete());
                    session()->forget('cart_session_id');
                }
                return response()->json(['success' => true, 'message' => 'OTP Verified', 'redirect_url' => $redirect_url]);
            }
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/')->with(toast('Logged Out Successfully'));
    }
}
