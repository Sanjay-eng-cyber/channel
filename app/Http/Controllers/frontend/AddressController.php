<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'street_address' => 'required|string|min:5|max:120',
            'city' => 'required|string|min:3|max:40',
            'state' => 'required|string|min:3|max:40',
            'country' => 'required|string|min:3|max:40',
            'postal_code' => 'required|digits:6',
        ]);
        $userAddressCount = auth()->user()->userAddress()->count();
        //dd($userAddressCount);
        if ($userAddressCount >= 3) {
            return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Maximum 3 address allow for one user.']);
        }
        $address = new UserAddress;
        $address->type = $userAddressCount ? 'secondary' : 'primary';
        $address->user_id = auth()->user()->id;
        $address->name = $request->name;
        $address->street_address = $request->street_address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->postal_code = $request->postal_code;
        if ($address->save()) {
            return redirect()->back()->with([
                "message" => "Address Added Successfully",
                "alert-type" => "success"
            ]);
        }
        return redirect()->back()->with([
            "message" => "Something went wrong",
            "alert-type" => "error"
        ]);
    }

    public function destroy($id)
    {
        $userAddress = auth()->user()->userAddress()->where('type','secondary')->find($id);
        // dd($userAddress);
        if ($userAddress->delete()) {
            return redirect()->back()->with(['alert-type' => 'success', 'message' => 'Address Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
