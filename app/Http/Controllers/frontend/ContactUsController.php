<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function submit(Request $request)
    {
        //dd($request);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:3|max:30',
                'phone' => 'required|string|digits:10',
                'email' => 'required|string|email:rfc,dns|min:5|max:40',
                'message' => 'required|string|min:5|max:250',
                'recaptcha_response' => 'required',
            ],
            [],
            [
                'recaptcha_response' => 'google recaptcha'
            ]
        );

        if ($validator->fails()) {
            session()->flash('contact-from-error', true);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $response = Http::get('https://www.google.com/recaptcha/api/siteverify' . '?secret=' . config('app.google_captcha_secret_key') . '&response=' . $request->recaptcha_response)->json();
        if ($response && $response['success'] == true && $response['score'] >= 0.5 && $response['action'] == 'submit') {
            $data =  (object) array();
            $data->name = $request->get('name');
            $data->email = $request->get('email');
            $data->phone = $request->get('phone');
            $data->message = $request->get('message');

            $contact =  new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->ip_address = $_SERVER['REMOTE_ADDR'];
            if ($contact->save()) {
                Mail::to(config('app.mail_to_address'))->send(new ContactMail($data));
                if (Mail::failures()) {
                    return redirect()->back()->with([
                        "message" => "Something went wrong. Please contact us via email or phone.",
                        "alert-type" => "error"
                    ]);
                } else {
                    return redirect()->back()->with([
                        "message" => "Message Sent Successfully",
                        "alert-type" => "success"
                    ]);
                }
            }
        } else {
            session()->flash('customer-form-error', true);
            return redirect(url()->previous() . "#contact")->with(['alert-type' => 'error', 'message' => 'Google Captcha is Invalid'])->withInput();
        }
    }
}
