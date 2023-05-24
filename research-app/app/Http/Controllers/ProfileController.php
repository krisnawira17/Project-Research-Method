<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
        if ($request->hasFile('profilePicture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
        
            $profilePicture = $request->file('profilePicture');
            $path = Storage::disk('public')->putFile('profile_pictures', $profilePicture);
        
            $user->profile_picture = $path;
        }
    
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

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
