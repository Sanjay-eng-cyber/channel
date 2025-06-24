<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::with('couponUsage')->latest()->paginate(10);
        return view('backend.coupon.index', compact('coupons'));
    }

    public function couponUsageIndex($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon_usages = $coupon->couponUsage()->latest()->paginate(10);
        return view('backend.coupon.coupon_usages_index', compact('coupon', 'coupon_usages'));
    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.show', compact('coupon'));
    }

    public function create()
    {
        return view('backend.coupon.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:40|unique:coupons,name',
            'code' => 'required|string|max:12|min:3|unique:coupons,code',
            'type' => 'required|string|in:promo,external',
            'rate' => 'required|string|in:flat,percent',
            'max_usage' => 'required|numeric|min:0|max:100',
            'valid_from' => 'required|date',
            'valid_till' => 'required|date|after:valid_from',
            'min_order_amount' => 'required|numeric|min:100|max:50000',

        ]);

        if ($request->rate == 'flat') {
            $request->validate([
                'value' => 'required|numeric|min:1|max:2000',
            ], [
                'value.min' => 'The value must be at least 1 when type is flat.',
                'value.max' => 'The value may not be greater than 2000 when type is flat',
            ]);
        } elseif ($request->rate == 'percent') {
            $request->validate([
                'value' => 'required|numeric|min:1|max:50',
            ], [
                'value.min' => 'The value must be at least 1 when type is percent.',
                'value.max' => 'The value may not be greater than 50 when type is percent',
            ]);
        }

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->rate = $request->rate;
        $coupon->value = $request->value;
        $coupon->max_usage = $request->max_usage;
        $coupon->valid_from = $request->valid_from;
        $coupon->valid_till = $request->valid_till;
        $coupon->min_order_amount = $request->min_order_amount;
        if ($coupon->save()) {
            return redirect()->route('backend.coupon.index')->with(['alert-type' => 'success', 'message' => 'Coupon Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:40|unique:coupons,name,' . $id,
            'code' => 'required|string|max:12|min:3|unique:coupons,code,' . $id,
            'type' => 'required|string|in:promo,external',
            'rate' => 'required|string|in:flat,percent',
            'max_usage' => 'required|numeric|min:0|max:100',
            'valid_from' => 'required|date',
            'valid_till' => 'required|date|after:valid_from',
            'min_order_amount' => 'required|numeric|min:100|max:50000',

        ]);

        if ($request->rate == 'flat') {
            $request->validate([
                'value' => 'required|numeric|min:1|max:2000',
            ], [
                'value.min' => 'The value must be at least 1 when type is flat.',
                'value.max' => 'The value may not be greater than 2000 when type is flat',
            ]);
        } elseif ($request->rate == 'percent') {
            $request->validate([
                'value' => 'required|numeric|min:1|max:50',
            ], [
                'value.min' => 'The value must be at least 1 when type is percent.',
                'value.max' => 'The value may not be greater than 50 when type is percent',
            ]);
        }

        $coupon = Coupon::findOrFail($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->rate = $request->rate;
        $coupon->value = $request->value;
        $coupon->max_usage = $request->max_usage;
        $coupon->valid_from = $request->valid_from;
        $coupon->valid_till = $request->valid_till;
        $coupon->min_order_amount = $request->min_order_amount;
        if ($coupon->save()) {
            return redirect()->route('backend.coupon.index')->with(['alert-type' => 'success', 'message' => 'Coupon Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon_usages = $coupon->couponUsage()->exists();
        if ($coupon_usages) {
            return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Coupon Already Used']);
        }
        if ($coupon->delete()) {
            return redirect()->route('backend.coupon.index')->with(['alert-type' => 'success', 'message' => 'Coupon Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
