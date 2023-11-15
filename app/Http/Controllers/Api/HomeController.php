<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::all();
        $products= Product::select('product_id','product_name','price','img_url','category_id','brand_id',"updated_at")
        ->with('categories:category_id,category_name','brands:brand_id,brand_name')
        ->get();
        return response()->json(['products'=>$products,'category'=>$category], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function fillterWithCategory(Category $id)
    {
        //
        $products= Product::select('product_id','product_name','price','img_url','category_id','brand_id',"updated_at")
        ->with('categories:category_id,category_name','brands:brand_id,brand_name')
        ->where('category_id',$id->category_id)
        ->get();


        return response()->json(['products'=>$products], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
