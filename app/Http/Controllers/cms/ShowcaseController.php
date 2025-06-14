<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    public function index()
    {
        $showcases = Showcase::latest()->paginate(10);
        return view('backend.showcase.index', compact('showcases'));
    }

    public function show($id)
    {
        $showcase = Showcase::findOrFail($id);
        return view('backend.showcase.show', compact('showcase'));
    }

    public function create()
    {
        return view('backend.showcase.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:40',
        ]);
        $showcase = new Showcase();
        $showcase->name = $request->name;
        if ($showcase->save()) {
            return redirect()->route('backend.showcase.index')->with(['alert-type' => 'success', 'message' => 'Showcase Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $showcase = Showcase::findOrFail($id);
        return view('backend.showcase.edit', compact('showcase'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:40',
        ]);
        $showcase = Showcase::findOrFail($id);
        $showcase->name = $request->name;
        if ($showcase->save()) {
            return redirect()->route('backend.showcase.index')->with(['alert-type' => 'success', 'message' => 'Showcase Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function destroy($id)
    {
        $showcase = Showcase::findOrFail($id);
        if ($showcase->delete()) {
            return redirect()->route('backend.showcase.index')->with(['alert-type' => 'success', 'message' => 'Showcase Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
