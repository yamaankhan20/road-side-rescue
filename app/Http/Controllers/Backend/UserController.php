<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserProfilepic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{



    public function dashboard(){
        $data =  [

            "title" => "User Dasboard | Roadside Rescue",
            "breadcrumb" =>"User Dasboard",
        ];

        return view('backend.admin-dasboard' ,$data);
    }

    public function Profile_edit()
    {
        $user = User::where("id",Auth::id())->get();
        $user_details = UserDetails::where('user_id',Auth::id())->get();
        $user_profile_pic = UserProfilepic::where('user_id',Auth::id())->get();
        $data =  [

            "title" => "User Profile | Roadside Rescue",
            "breadcrumb" =>"User Profile"

        ];

        return view('backend.edit-profile' ,$data, compact('user', "user_details", "user_profile_pic"));
    }





}
