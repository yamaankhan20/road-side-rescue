<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProfileditController extends Controller
{
    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user_ID = Auth::id();
        $user = User::where('id',$user_ID)->first();


        $updated = DB::table('user_details')
            ->where('user_id', $user_ID)
            ->update([
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal_code'),
                'country' => $request->input('country'),
                'about_me' => $request->input('about_me'),
                'apartment' => $request->input('apartment')
            ]);

        $updated_user = DB::table('users')
            ->where('id', $user_ID)
            ->update([
                'name' => $request->input('name')
            ]);

        $updated_user_profile = '';
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            if ($image->isValid()) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/properties_images', $imageName);

                $updated_user_profile = DB::table('user_profile_pic')
                    ->where('user_id', $user_ID)
                    ->update([
                        'profile_pic' => str_replace('public/', '', $imagePath)
                    ]);


            } else {
                return redirect()->back()->with('error', 'Invalid image file.');
            }
        }

        if($updated_user || $updated || $updated_user_profile){
            if ($user->role == 'admin') {
                return redirect()->route('adminProfileedit')->with('success', 'Profile updated successfully!');
            } elseif ($user->role == 'vendor') {
                return redirect()->route('vendorProfileedit')->with('success', 'Profile updated successfully!');
            } else {
                return redirect()->route('userProfileedit')->with('success', 'Profile updated successfully!');
            }

        }else{
            if ($user->role == 'admin') {
                return redirect()->route('adminProfileedit')->with('error', 'Error updating Profile!');
            } elseif ($user->role == 'vendor') {
                return redirect()->route('vendorProfileedit')->with('error', 'Error updating Profile!');
            } else {
                return redirect()->route('userProfileedit')->with('error', 'Error updating Profile!');
            }
        }

    }
}
