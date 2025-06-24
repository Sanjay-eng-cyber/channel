<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userAddresses = $user->userAddress()->orderBy('type', 'asc');
        //dd($user);
        return view('frontend.profile', compact('user', 'userAddresses'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            //'phone' => 'required|string|digits:10',
            'email' => 'nullable|string|email:rfc,dns|min:5|max:50',
            'gender' => 'required|string|in:male,female',
        ]);

        $profile = auth()->user();
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        $profile->gender = $request->gender;
        if ($profile->save()) {
            return redirect()->back()->with([
                "message" => "Profile Updated Successfully",
                "alert-type" => "success"
            ]);
        }
        return redirect()->back()->with([
            "message" => "Something went wrong.",
            "alert-type" => "error"
        ]);
    }
    public function updateProfileImage(Request $request)
    {
        // dd($request);
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:10240'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $fileWithExtension = $request->file('image');
        $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
        $destinationPath = storage_path('app/public/images/profile/');
        $img = Image::make($fileWithExtension->getRealPath())->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upSize();
        });
        $img->save($destinationPath . $filename, 80);
        if ($user->profile_image) {
            Storage::disk('public')->delete('images/profile/' . $user->profile_image);
        }
        $user->profile_image = $filename;
        if ($user->save()) {
            return redirect()->back()->with(toast("Profile Image Updated", 'success'));
        }
        return redirect()->back()->with(toast("Something Went Wrong", 'error'));
    }
}
