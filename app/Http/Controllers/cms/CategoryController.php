<?php

namespace App\Http\Controllers\cms;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::latest()->paginate(10);
        return view('backend.category.index',compact('categorys'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.show', compact('category'));
    }

    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:80|unique:categories,name,',
           'image' => 'required|max:1024|mimes:jpeg,png,jpg,pdf',
           'descriptions' => 'nullable|min:3|max:250'
        ]);
        $fileWithExtension = $request->file('image');
      // dd($fileWithExtension);
       if ($fileWithExtension) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/categories/');
              $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                  $constraint->aspectRatio();
                  $constraint->upSize();
              });
            $img->save($destinationPath . $filename, 85);
       }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->image = $filename;
        $category->descriptions = $request->descriptions;
        if ($category->save()) {
            return redirect()->route('backend.category.index')->with(['alert-type' => 'success', 'message' => 'Category Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:80|unique:categories,name,' .$id,
            'image' => 'nullable|max:1024|mimes:jpeg,png,jpg,pdf',
            'descriptions' => 'nullable|min:3|max:250'
        ]);

        $fileWithExtension = $request->file('image');
        $category = Category::findOrFail($id);
        if ($request->has('image')) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/categories/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 85);
            if ($category->image) {
                Storage::disk('public')->delete('images/categories/' . $category->image);
            }
            $category->image = $filename;
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->descriptions = $request->descriptions;
        if ($category->save()) {
            return redirect()->route('backend.category.index')->with(['alert-type' => 'success', 'message' => 'Category Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->delete() && Storage::disk('public')->delete('images/categories/' . $category->image)) {
            return redirect()->route('backend.category.index')->with(['alert-type' => 'success', 'message' => 'Category Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
