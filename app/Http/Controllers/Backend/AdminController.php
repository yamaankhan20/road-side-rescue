<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use App\Models\UserProfilepic;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('admin');
    }



            public function dashboard(){
                $all_Category = Category::all();
                $Counter = $all_Category->count();

                $all_users = User::where("role","vendor")->get();
                $vendor_count = $all_users->count();

                $data =  [

                    "title" => "Admin Dasboard | Roadside Rescue",
                    "breadcrumb" =>"Admin Dasboard",
                ];

                return view('backend.admin-dasboard' ,$data, compact("Counter","vendor_count"));

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



            public function vendors_list(){
                $data =  [

                    "title" => "Admin Lists | Roadside Rescue",
                    "breadcrumb" =>"Admin Lists"


                ];

                return view('backend.vendors.vendor-lists' ,$data);

            }


            public function private_chat(){

                $data =  [

                    "title" => "Private Chat | Roadside Rescue",
                    "breadcrumb" =>"Private Chat"


                ];

                return view('backend.chat.private-chat' ,$data);

            }



}
