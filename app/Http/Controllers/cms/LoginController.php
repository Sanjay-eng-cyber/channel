<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginShow()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:20']
        ]);
        // dd($request);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('cms.statistics.index')->with(['alert-type' => 'success', 'message' => 'Login Successfully.']);
        } else {
            return redirect()->back()->withErrors(["credentials" => "Credentials doesn't match our records"]);
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')) {
            Auth::guard('admin')->logout();
        }
        return redirect()->route('cms.login');
    }
}
