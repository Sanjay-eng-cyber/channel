<?php

namespace App\Http\Controllers\cms;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::latest()->paginate(10);
        return view('backend.attribute.index', compact('attributes'));
    }

    public function show($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('backend.attribute.show', compact('attribute'));
    }

    public function create()
    {
        return view('backend.attribute.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:40|unique:attributes,name',
        ]);
        $attribute = new Attribute();
        $attribute->name = $request->name;
        if ($attribute->save()) {
            return redirect()->route('backend.attribute.index')->with(['alert-type' => 'success', 'message' => 'Attribute Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('backend.attribute.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:40|unique:attributes,name,' . $id,
        ]);
        $attribute = Attribute::findOrFail($id);
        $attribute->name = $request->name;
        if ($attribute->save()) {
            return redirect()->route('backend.attribute.index')->with(['alert-type' => 'success', 'message' => 'Attribute Updated Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        // dd($attribute->products()->count());
        if ($attribute->values()->exists() || $attribute->products()->exists()) {
            return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Product / Values Exists With This Attribute']);
        }
        if ($attribute->delete()) {
            return redirect()->route('backend.attribute.index')->with(['alert-type' => 'success', 'message' => 'Attribute Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
