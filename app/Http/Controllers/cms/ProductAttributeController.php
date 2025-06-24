<?php

namespace App\Http\Controllers\cms;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    public function index()
    {
        $product_attribute_values = AttributeValue::latest()->paginate(10);
        return view('backend.product_attribute_value.index', compact('product_attribute_values'));
    }

    public function show($id)
    {
        $product_attribute_value = AttributeValue::findOrFail($id);
        return view('backend.product_attribute_value.show', compact('product_attribute_value'));
    }

    public function create()
    {
        $attributes = Attribute::all();
        return view('backend.product_attribute_value.create', compact('attributes'));
    }


    public function store(Request $request)
    {
        $attribute = Attribute::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:2|max:40|unique:attribute_values,name',
            'attribute_id' => ['required', Rule::in($attribute)],
        ]);
        $product_attribute_value = new AttributeValue();
        $product_attribute_value->name = $request->name;
        $product_attribute_value->attribute_id = $request->attribute_id;
        if ($product_attribute_value->save()) {
            return redirect()->route('backend.product_attribute_value.index')->with(['alert-type' => 'success', 'message' => 'Product Attribute Value Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $product_attribute_value = AttributeValue::findOrFail($id);
        $attributes = Attribute::all();
        return view('backend.product_attribute_value.edit', compact('product_attribute_value', 'attributes'));
    }

    public function update(Request $request, $id)
    {
        $attribute = Attribute::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:2|max:40|unique:attribute_values,name,' . $id,
            'attribute_id' => ['required', Rule::in($attribute)],
        ]);

        $product_attribute_value = AttributeValue::findOrFail($id);
        $product_attribute_value->name = $request->name;
        $product_attribute_value->attribute_id = $request->attribute_id;
        if ($product_attribute_value->save()) {
            return redirect()->route('backend.product_attribute_value.index')->with(['alert-type' => 'success', 'message' => 'Product Attribute Value Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function destroy($id)
    {
        $product_attribute_value = AttributeValue::findOrFail($id);
        $productAttributeExists = ProductAttribute::where('attribute_value_id', $id)->exists();
        //dd($productAttributeExists);
        if (!$productAttributeExists) {
            if ($product_attribute_value->delete()) {
                return redirect()->route('backend.product_attribute_value.index')->with(
                    [
                        "message" => "Product Attribute Value Deleted Successfully", "alert-type" => "success"
                    ]
                );
            } else {
                return redirect()->route('backend.product_attribute_value.index')->with(
                    [
                        "message" => "Something Went Wrong", "alert-type" => "error"
                    ]
                );
            }
        } else {
            return redirect()->route('backend.product_attribute_value.index')->with(
                [
                    "message" => "Attribute Value Exist In Product", "alert-type" => "error"
                ]
            );
        }
    }
}
