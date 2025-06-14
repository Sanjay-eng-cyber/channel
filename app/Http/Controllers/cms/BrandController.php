<?php

namespace App\Http\Controllers\cms;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('backend.brand.index',compact('brands'));
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.show', compact('brand'));
    }

    public function create()
    {
        return view('backend.brand.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:80|unique:brands,name,',
           'image' => 'required|max:1024|mimes:jpeg,png,jpg,pdf',
           'descriptions' => 'nullable|min:3|max:250'
        ]);
        $fileWithExtension = $request->file('image');
      // dd($fileWithExtension);
       if ($fileWithExtension) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/brands/');
              $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                  $constraint->aspectRatio();
                  $constraint->upSize();
              });
            $img->save($destinationPath . $filename, 85);
       }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->image = $filename;
        $brand->descriptions = $request->descriptions;
        if ($brand->save()) {
            return redirect()->route('backend.brand.index')->with(['alert-type' => 'success', 'message' => 'Brand Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:80|unique:brands,name,' .$id,
            'image' => 'nullable|max:1024|mimes:jpeg,png,jpg,pdf',
            'descriptions' => 'nullable|min:3|max:250'
        ]);

        $fileWithExtension = $request->file('image');
        $brand = Brand::findOrFail($id);
        if ($request->has('image')) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/brands/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 85);
            if ($brand->image) {
                Storage::disk('public')->delete('images/brands/' . $brand->image);
            }
            $brand->image = $filename;
        }
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->descriptions = $request->descriptions;
        if ($brand->save()) {
            return redirect()->route('backend.brand.index')->with(['alert-type' => 'success', 'message' => 'Brand Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);

    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->delete() && Storage::disk('public')->delete('images/brands/' . $brand->image)) {
            return redirect()->route('backend.brand.index')->with(['alert-type' => 'success', 'message' => 'Brand Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
