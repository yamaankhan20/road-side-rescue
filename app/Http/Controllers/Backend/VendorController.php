<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserProfilepic;
use Illuminate\Http\Request;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function dashboard(){
        $all_Service = Service::all();
        $Counter = $all_Service->count();

        $data =  [

            "title" => "Vendor Dasboard | Roadside Rescue",
            "breadcrumb" =>"Vendor Dasboard",
        ];

        return view('backend.admin-dasboard' ,$data, compact('Counter'));

    }

    public function private_chat(){

        $data =  [

            "title" => "Private Chat | Roadside Rescue",
            "breadcrumb" =>"Private Chat"


        ];

        return view('backend.chat.private-chat' ,$data);

    }
    public function Profile_edit(){

        $user = User::where("id",Auth::id())->get();
        $user_details = UserDetails::where('user_id',Auth::id())->get();
        $user_profile_pic = UserProfilepic::where('user_id',Auth::id())->get();
        $data =  [

            "title" => "Vendor Profile | Roadside Rescue",
            "breadcrumb" =>"User Profile"

        ];

        return view('backend.edit-profile' ,$data, compact('user', "user_details", "user_profile_pic"));

    }




}
