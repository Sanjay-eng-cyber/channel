<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userAddresses = $user->userAddress()->orderBy('type', 'asc');
        //dd($user);
        return view('frontend.profile', compact('user', 'userAddresses'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            //'phone' => 'required|string|digits:10',
            'email' => 'nullable|string|email:rfc,dns|min:5|max:50',
            'gender' => 'required|string|in:male,female',
        ]);

        $profile = auth()->user();
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        //$profile->phone = $request->phone;
        $profile->gender = $request->gender;
        if ($profile->save()) {
            return redirect()->back()->with([
                "message" => "Profile Updated Successfully",
                "alert-type" => "success"
            ]);
        }
        return redirect()->back()->with([
            "message" => "Something went wrong.",
            "alert-type" => "error"
        ]);
    }
}
