<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogIn extends Component
{

    public $step = 1;
    public $mobile_no = null;
    public $isOtpSent = false;
    public $otp = null;

    public function sendOtp()
    {
        $validatedData = Validator::make(
            ['mobile_no' => $this->mobile_no],
            ['mobile_no' => 'required|digits:10']
        )->validate();

        if ($this->otpSent($this->mobile_no)) {
            $this->step = 2;
        }
    }

    public function submitOtp()
    {
        $validatedData = Validator::make(
            ['mobile_no' => $this->mobile_no],
            ['mobile_no' => 'required|digits:10'],
            ['otp' => $this->otp],
            ['otp' => 'required|string|min:4']
        )->validate();
        // dd($this->mobile_no);
        if ($this->verifyOtp($this->mobile_no, $this->otp)) {
            $user = User::firstOrCreate(
                ['phone' => $this->mobile_no],
                ['created_at' => now(), 'updated_at' => now()]
            );
            if ($user) {
                Auth::guard('web')->login($user);
                return redirect()->to('/')->with(['alert-type' => 'success', 'message' => 'Logged In Successfully']);
            }
            $this->addError('otp', 'Something Went Wrong.');
        } else {
            $this->addError('otp', 'The entered OTP is invalid.');
        }
    }

    public function back()
    {
        $this->step = 1;
        $this->mobile_no = null;
        $this->otp = null;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.log-in');
    }

    public function otpSent($mobile_no)
    {
        return true;
    }

    public function verifyOtp($mobile_no, $otp)
    {
        if ($otp == "1234") {
            return true;
        }
        return false;
    }
}
