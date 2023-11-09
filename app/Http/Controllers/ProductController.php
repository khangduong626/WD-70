<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
        $products= Product::select('product_id','product_name','price','img_url','category_id',"updated_at")
        ->with('categories:category_id,category_name')
        ->get();
        
        
        return view('layouts.pages.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        $brands = Brand::all();
        return view('layouts.pages.product.create',['categories'=>$category,'brands'=>$brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('img_url')){
            $file = $request->img_url;
            $fileHashName = $file->hashName();
            $fileName = $request->name.'_'.$fileHashName;
            $path = public_path().'/images/products';
            $file -> move($path,$fileName);
            $product->img_url = "/images/products/$fileName";
        }
        else {
            $product->img_url = '';
        }
        

        $product->save();
        return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $id)
    {
        //
        $category = Category::all();
        $brands = Brand::all();
        return view('layouts.pages.product.create',['products'=>$id,'categories'=>$category,'brands'=>$brands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $id)
    {
        //
        $products = $id ;
        $products->product_name =$request->product_name;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        if($request->hasFile('img_url')){
            $file = $request->img_url;
            $fileHashName = $file->hashName();
            $fileName = $request->name.'_'.$fileHashName;
            $path = public_path().'/images/products';
            $file -> move($path,$fileName);
            $products->img_url = "/images/products/$fileName";
        }
        else {
            $products->img_url = $products->img_url;
        }
        $products->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $id)
    {
        //
        if($id->delete()){
            return redirect()->route('product.index');
        }
    }
}
