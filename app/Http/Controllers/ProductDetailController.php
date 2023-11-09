<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_detail;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;



class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $id)
    {
        //
        $product_detail = Product_detail::select('product_detail_id','product_id','color_id','size_id','images','stock_quantity','price','description','updated_at')
        ->where('product_id',$id->product_id)
        ->with('colors:color_id,color','sizes:size_id,size')
        ->get();
        return view('layouts.pages.productdetail.index',['productdetail'=>$product_detail,'products'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $id)
    {
        //
        $colors = Color::all();
        $sizes = Size::all();
        return view('layouts.pages.productdetail.create',['colors'=>$colors,'sizes'=>$sizes,'product_id'=>$id->product_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $pd = new Product_detail();
        $pd->fill($request->all());
        if($request->hasFile('images')){
            $file = $request->images;
            $fileHashName = $file->hashName();
            $fileName = $request->name.'_'.$fileHashName;
            $path = public_path().'/images/products';
            $file -> move($path,$fileName);
            $pd->images = "/images/products/$fileName";
        }
        else {
            $pd->images = '';
        }
        

        $pd->save();
         return redirect()->route('productdetail.index',$request->product_id);
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
    public function edit(Product_detail $id)
    {
        //
       
        $colors = Color::all();
        $sizes = Size::all();
        return view ('layouts.pages.productdetail.create',['sizes'=>$sizes, 'colors'=>$colors , 'productdetail'=> $id ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product_detail $id)
    {
        //
        $pd = $id ;
        $pd->price =$request->price;
        $pd->size_id = $request->size_id;
        $pd->color_id = $request->color_id;
        $pd->stock_quantity =$request->stock_quantity;
        $pd->description =$request->description;

        if($request->hasFile('images')){
            $file = $request->images;
            $fileHashName = $file->hashName();
            $fileName = $request->name.'_'.$fileHashName;
            $path = public_path().'/images/products';
            $file -> move($path,$fileName);
            $pd->images = "/images/products/$fileName";
        }
        else {
            $pd->images = $pd->images;
        }
        $pd->save();
        return redirect()->route('productdetail.index',$pd->product_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product_detail $id)
    {
        //
        if($id->delete()){
            return redirect()->back();
        }
    }
}
