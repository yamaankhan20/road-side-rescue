<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(["success"=>false, "error"=>$validator->errors()], 422);
        }

        $user_id = $request->user_id;
        $services = Service::where('vendor_id', $user_id)->get();

        if($services->isEmpty()){
            return response()->json(["success"=>false, "error"=>"No services found"]);
        }

        return response()->json(['success' => true, 'services' => $services], 200);
    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'vendor_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(["success"=>false, "error"=>$validator->errors()], 422);
        }

        $created_service =  Service::create($request->all());
        return response()->json(['success' => true, 'message' => 'Service Created', 'service'=>$created_service], 200);
    }

    public function delete(Request $request, Service $service)
    {
        $delete_services = $service->delete();
        if($delete_services){
            return response()->json(['success' => true, 'message' => 'Service Deleted', 'service'=>$service], 200);
        }

        return response()->json(['success' => false, 'message' => 'Service Not Deleted'], 500);

    }

    public function update(Request $request, Service $service){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(["success"=>false, "error"=>$validator->errors()], 422);
        }

        $service->update($request->all());
        return response()->json(['success' => true, 'message' => 'Service Updated', 'service'=> $service], 200);
    }
}
