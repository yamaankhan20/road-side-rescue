<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function dashboard(){

        $data =  [

            "title" => "Vendor Dasboard | Roadside Rescue",
            "breadcrumb" =>"Vendor Dasboard",
        ];

        return view('backend.admin-dasboard' ,$data);

    }

    public function private_chat(){

        $data =  [

            "title" => "Private Chat | Roadside Rescue",
            "breadcrumb" =>"Private Chat"


        ];

        return view('backend.chat.private-chat' ,$data);

    }
}
