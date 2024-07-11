<?php
// app/Http/Controllers/CategoryController.php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $title  = "Categories List | Roadside Rescue";
        $breadcrumb = 'Category List';
        return view('backend.vendors.categories.services-cat-list', compact('categories','title' ,'breadcrumb'));
    }

    public function create()
    {
        $data = ['title' =>'Category Create | Roadside Rescue' ,'breadcrumb'=>'Category Create'] ;
        return view('backend.vendors.categories.create-services-cat',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $data = ['title' =>'Category Edit | Roadside Rescue' ,'breadcrumb'=>'Category Edit','id'=> $category->id, "name" => $category->category_name] ;
        return view('backend.vendors.categories.edit-service-cat', compact('category'), $data);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
