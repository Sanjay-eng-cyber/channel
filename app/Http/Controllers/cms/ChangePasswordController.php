<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        $user = Auth::guard('admin')->user('id');
        return view('backend.changePassword.index', ['user' => $user]);
    }

    public function passwordChange(Request $request, $id)
    {
        $validate = $request->validate([
            'email' => ['required', 'string', 'email', 'min:6', 'max:255', "unique:cms_users,email,$id"],
            'password' => ['required', 'confirmed', 'string', 'min:8', 'max:16'],
        ]);

        $password = Auth::guard('admin')->user();
        $password->email = $request->email;
        $password->password = Hash::make($request->password);
        if ($password->save()) {
            return redirect()->back()->with([
                "message" => "Password Changed Successfully",
                "alert-type" => "success"
            ]);
        } else {
            return redirect()->back()->with([
                "message" => "Something went wrong. Contact admin.",
                "alert-type" => "error"
            ]);
        }
    }
}
