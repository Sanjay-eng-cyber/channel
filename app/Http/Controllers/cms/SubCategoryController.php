<?php

namespace App\Http\Controllers\cms;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::latest()->paginate(10);
        return view('backend.sub_category.index',compact('sub_categories'));
    }

    public function show($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        return view('backend.sub_category.show', compact('sub_category'));
    }

    public function create()
    {
        $categorys = Category::all();
        return view('backend.sub_category.create',compact('categorys'));
    }


    public function store(Request $request)
    {
        $categorys = Category::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:3|max:40|unique:sub_categories,name,',
           'image' => 'required|max:1024|mimes:jpeg,png,jpg,pdf',
           'descriptions' => 'nullable|min:3|max:250',
           'category_id' => ['required', Rule::in($categorys)],
        ]);
        $fileWithExtension = $request->file('image');
      // dd($fileWithExtension);
       if ($fileWithExtension) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/sub_categories/');
              $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                  $constraint->aspectRatio();
                  $constraint->upSize();
              });
            $img->save($destinationPath . $filename, 85);
       }

        $sub_category = new SubCategory();
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->slug = Str::slug($request->name);
        $sub_category->image = $filename;
        $sub_category->descriptions = $request->descriptions;
        if ($sub_category->save()) {
            return redirect()->route('backend.sub_category.index')->with(['alert-type' => 'success', 'message' => 'Sub Category Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $categorys = Category::all();
        return view('backend.sub_category.edit', compact('sub_category','categorys'));
    }

    public function update(Request $request, $id)
    {
        $categorys = Category::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:3|max:40|unique:sub_categories,name,' .$id,
            'image' => 'nullable|max:1024|mimes:jpeg,png,jpg,pdf',
            'descriptions' => 'nullable|min:3|max:250',
            'category_id' => ['required', Rule::in($categorys)],
        ]);

        $fileWithExtension = $request->file('image');
        $sub_category = SubCategory::findOrFail($id);
        if ($request->has('image')) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/sub_categories/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 85);
            if ($sub_category->image) {
                Storage::disk('public')->delete('images/sub_categories/' . $sub_category->image);
            }
            $sub_category->image = $filename;
        }
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->slug = Str::slug($request->name);
        $sub_category->descriptions = $request->descriptions;
        if ($sub_category->save()) {
            return redirect()->route('backend.sub_category.index')->with(['alert-type' => 'success', 'message' => 'Sub Category Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);

    }

    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        if ($sub_category->delete() && Storage::disk('public')->delete('images/sub_categories/' . $sub_category->image)) {
            return redirect()->route('backend.sub_category.index')->with(['alert-type' => 'success', 'message' => 'Sub Category Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
