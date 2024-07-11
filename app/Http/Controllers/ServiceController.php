<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $services = Service::where('vendor_id', $user_id)->get();
        $title  = "Services List | Roadside Rescue";
        $breadcrumb = 'Services List';
        return view('backend.vendors.services.services-list', compact('services','title' ,'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Category = Category::all();
        $data = ['title' =>'Services Create | Roadside Rescue' ,'breadcrumb'=>'Services Create'] ;
        return view('backend.vendors.services.create-services',compact("Category"), $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'required|string',
        ]);
        $request["vendor_id"] = Auth::id();
        Service::create($request->all());
        return redirect()->route("services.index")->with("success","Service created successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        $Category = Category::all();

        $data = [
                'title' =>'Service Edit | Roadside Rescue',
                'breadcrumb'=>'Service Edit',

        ];
        return view('backend.vendors.services.edit-service', compact('service', "Category"), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'required|string',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Services updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Category deleted successfully.');
    }
}
