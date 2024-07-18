<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
class WebsiteController extends Controller
{
    public function index(){

        $data_category = Category::all();

        $data = [

                "title" => "Home | Roadside Rescue"

        ];

        return view('frontend.index',$data, compact('data_category'));

    }

    public function requested_services(Request $request){
        $location = $request->query('location');
        $serv = $request->query('serv');

        $service_all_data = Service::where('category_id', $serv)
            ->get();
        return view('frontend.requested-services', compact('service_all_data'));
    }
}
