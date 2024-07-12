<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['success' => true, 'categories' => $categories], 200);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $category = Category::create($request->all());
        return response()->json(['success' => true, "message"=>"Category Added", "category"=> $category], 200);

    }
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }


        $category->update($request->all());
        return response()->json(['success' => true, "message"=>"Category Updated"], 200);
    }

    public function delete(Request $request, Category $category)
    {

        $category_delete = $category->delete();
        if ($category_delete) {
            return response()->json(['success' => true, "message"=>"Category Deleted", "category"=> $category], 200);
        }else{
            return response()->json(['success' => false, "message"=>"Category Not Found"], 500);
        }


    }
}
