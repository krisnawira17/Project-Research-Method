<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function getProfile(){
        $user = Auth::user();

        return view('profile',compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profile_picture = $request->input('profilePicture');

        $address = $user->address;

        $address->address_line_1= $request->input('address1');
        $address->address_line_2= $request->input('address2');
        $address->city = $request->input('city');
        $address->province = $request->input('province');

        $user->save();
        $address->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
        
    }
}
