<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('layouts.pages.brand.index',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('layouts.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $brandRequest = $request->all();
        $brands = new Brand();
        $brands->brand_name = $brandRequest['brand_name'];
        $brands->save();
        return redirect()->route('brand.index');
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
    public function edit(Brand $id)
    {
        //
        return view('layouts.pages.brand.create',['brand'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $id)
    {
        //
        $brands = $id ;
        $brands->brand_name =$request->brand_name;
        $brands->save();
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Brand $id)
    {
        //
        if($id->delete()){
            return redirect()->route('brand.index');
        }
    }
}
