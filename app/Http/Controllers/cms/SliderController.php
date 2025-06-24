<?php

namespace App\Http\Controllers\cms;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('backend.slider.index', compact('sliders'));
    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.show', compact('slider'));
    }

    public function create()
    {
        return view('backend.slider.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:right slider,left slider,middle slider',
            'title' => 'required|min:3|max:60',
            'descriptions' => 'nullable|min:3|max:120',
            'link' => 'required|min:3|max:120',
            // 'image' => 'required|max:1024|mimes:jpeg,png,jpg',

        ]);
        //dd($rightSliderCount);
        if ($request->type == 'left slider') {
            $request->validate([
                'image' => 'required|max:1024|mimes:jpeg,png,jpg|dimensions:width=500,height=700',
            ]);
            $leftSliderCount = Slider::where('type', 'left slider')->count();
            if ($leftSliderCount >= 5) {
                return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Maximum 5 Left Slider allowed.']);
            }
        }
        if ($request->type == 'middle slider') {
            $request->validate([
                'image' => 'required|max:1024|mimes:jpeg,png,jpg|dimensions:width=200,height=300',
            ]);
            $middleSliderCount = Slider::where('type', 'middle slider')->count();
            if ($middleSliderCount >= 1) {
                return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Please Edit Middle slider.']);
            }
        }
        if ($request->type == 'right slider') {
            $request->validate([
                'image' => 'required|max:1024|mimes:jpeg,png,jpg|dimensions:width=250,height=150',
            ]);
            $rightSliderCount = Slider::where('type', 'right slider')->count();
            if ($rightSliderCount >= 2) {
                return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Maximum 2 right Slider allowed.']);
            }
        }

        $fileWithExtension = $request->file('image');
        // dd($fileWithExtension);
        if ($fileWithExtension) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/sliders/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 85);
        }

        $slider = new Slider();
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->descriptions = $request->descriptions;
        $slider->link = $request->link;
        $slider->image = $filename;
        $slider->descriptions = $request->descriptions;
        if ($slider->save()) {
            return redirect()->route('backend.slider.index')->with(['alert-type' => 'success', 'message' => 'Slider Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'type' => 'required',
            'title' => 'required|string|min:3|max:60',
            'descriptions' => 'nullable|min:3|max:120',
            'link' => 'required|url|min:3|max:200',
        ]);
        $slider = Slider::findOrFail($id);

        if ($slider->type == 'middle slider') {
            $request->validate([
                'image' => 'nullable|max:1024|mimes:jpeg,png,jpg|dimensions:width=200,height=300',
            ], [
                'image.dimensions' => 'The image dimension should be 200x300',
            ]);
            $width = 200;
            $height = 300;
        }
        if ($slider->type == 'right slider') {
            $request->validate([
                'image' => 'nullable|max:1024|mimes:jpeg,png,jpg|dimensions:width=250,height=150',
            ], [
                'image.dimensions' => 'The image dimensions should be 250x150',
            ]);
            $width = 250;
            $height = 150;
        }
        if ($slider->type == 'left slider') {
            $request->validate([
                'image' => 'nullable|max:1024|mimes:jpeg,png,jpg|dimensions:width=500,height=700',
            ], [
                'image.dimensions' => 'The image dimensions should be 500x700',
            ]);
            $width = 500;
            $height = 700;
        }

        $fileWithExtension = $request->file('image');
        if ($request->has('image')) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/sliders/');
            $img = Image::make($fileWithExtension->getRealPath())->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 90);
            if ($slider->image) {
                Storage::disk('public')->delete('images/sliders/' . $slider->image);
            }
            $slider->image = $filename;
        }
        // $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->descriptions = $request->descriptions;
        $slider->link = $request->link;
        if ($slider->save()) {
            return redirect()->route('backend.slider.index')->with(['alert-type' => 'success', 'message' => 'Slider Updated Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->delete() && Storage::disk('public')->delete('images/sliders/' . $slider->image)) {
            return redirect()->route('backend.slider.index')->with(['alert-type' => 'success', 'message' => 'Slider Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
