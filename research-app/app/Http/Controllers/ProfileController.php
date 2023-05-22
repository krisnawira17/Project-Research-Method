<?php

namespace App\Http\Controllers;

use App\Models\Address;
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

        $user->name = $request->input('name') ?? $user->name;
        $user->email = $request->input('email') ?? $user->email;
        $user->profile_picture = $request->file('profilePicture') ?? $user->profile_picture;
        $user->save();

        if($user->address){
            $address = $user->address;
        }else{
            $address = new Address();
            $address->user_id = $user->id;
        }

        $address->address_line_1= $request->input('address1') ?? $address->address_line_1;
        $address->address_line_2= $request->input('address2') ?? $address->address_line_2;
        $address->city = $request->input('city') ?? $address->city;
        $address->province = $request->input('province') ?? $address->province;

       
        $address->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
        
    }
}
