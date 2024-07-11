<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){


        $data = [

                "title" => "Home | Roadside Rescue"

        ];

        return view('frontend.index',$data);

    }
}
