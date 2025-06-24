<?php

namespace App\Http\Controllers\frontend;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'street_address' => 'required|string|min:5|max:120',
            'city' => 'required|string|min:3|max:40',
            'state' => ['required', 'string', Rule::in(UserAddress::STATE)],
            'country' => ['required', 'string', Rule::in(UserAddress::COUNTRY)],
            'postal_code' => 'required|digits:6',
        ]);
        if ($validator->fails()) {
            session()->flash('store-form-error', true);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

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

    public function edit($id)
    {
        $userAddress = UserAddress::findOrFail($id);
        return response()->json([
            'status' => 200,
            'userAddress' => $userAddress,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'street_address' => 'required|string|min:5|max:120',
            'city' => 'required|string|min:3|max:40',
            'state' => ['required', 'string', Rule::in(UserAddress::STATE)],
            'country' => ['required', 'string', Rule::in(UserAddress::COUNTRY)],
            'postal_code' => 'required|digits:6',
        ]);
        if ($validator->fails()) {
            session()->flash('edit-form-error', true);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user = auth()->user();
        $address = $user->userAddress()->findOrFail($id);
        $address->name = $request->name;
        $address->street_address = $request->street_address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->postal_code = $request->postal_code;
        if ($address->save()) {
            return redirect()->back()->with([
                "message" => "Address Updated Successfully",
                "alert-type" => "success"
            ]);
        }
        return redirect()->back()->with([
            "message" => "Something went wrong",
            "alert-type" => "error"
        ]);
    }

    public function makePrimaryAddress($id)
    {
        $makeSecondary = auth()->user()->userAddress()->where('type', 'primary')->first();
        $makeSecondary->type = 'secondary';

        if ($makeSecondary->save()) {

            $makePrimary = auth()->user()->userAddress()->findOrFail($id);
            $makePrimary->type = 'primary';
            $makePrimary->save();

            return redirect()->back()->with([
                "message" => "Address Make Primary",
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
        $userAddress = auth()->user()->userAddress()->where('type', 'secondary')->findOrFail($id);
        // dd($userAddress);
        if ($userAddress->delete()) {
            return redirect()->back()->with(['alert-type' => 'success', 'message' => 'Address Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
