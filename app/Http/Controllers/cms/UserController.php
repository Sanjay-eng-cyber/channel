<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest();
        $users = $this->filterResults($request, $users);
        $users = $users->paginate(10);
        return view('backend.users.index', compact('users'));
    }

    protected function filterResults($request, $users)
    {
        if ($request->q !== '' && !is_null($request->q)) {
            if (is_numeric($request->q)) {
                $request->validate(['q' => 'digits_between:3,40'], ['q.*' => 'Please enter proper Number']);
            } else {
                $request->validate(['q' => 'min:3']);
            }
        }

        if ($request !== null && $request->has('q') && $request['q'] !== '') {
            $search = $request['q'];

            // $temp_appointment = $temp_appointment->where('mobile', 'LIKE', '%' . $search . '%')
            //     ->orWhere('name', 'LIKE', '%' . $search . '%')
            //     ->orWhere('email', 'LIKE', '%' . $search . '%');

            $users = $users->where(function ($query) use ($search) {
                $query->where(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', '%' . $search . '%')->
                orWhere('email', 'LIKE', '%' . $search . '%')->
                orWhere('phone', 'LIKE', '%' . $search . '%');
            });

        }
        return $users;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $userPrimaryAddress =  $user->userAddress->where('type','primary')->first();
        $userOtherAddress =  $user->userAddress()->where('type','!=','primary')->get();
        $orders = $user->orders()->latest()->paginate(10, ['*'], 'orders');
        $wishlists = $user->wishlist()->latest()->paginate(10, ['*'], 'wishlists');
        // dd($user->wishlist()->first()->product()->first());
      // dd($userOtherAddress);
        return view('backend.users.show', compact('user','userPrimaryAddress','userOtherAddress','orders','wishlists'));
    }
}
