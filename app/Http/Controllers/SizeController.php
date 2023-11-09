<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sizes = Size::all();
        return view ('layouts.pages.size.index',['sizes'=>$sizes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('layouts.pages.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $sizeRequest = $request->all();
        $sizes = new Size();
        $sizes->size = $sizeRequest['size_name'];
        $sizes->save();
        return redirect()->route('size.index');
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
    public function edit(Size $id)
    {
        //
        return view('layouts.pages.size.create',['size'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $id)
    {
        //
        $sizes = $id ;
        $sizes->size =$request->size_name;
        $sizes->save();
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Size $id)
    {
        //
        if($id->delete()){
            return redirect()->route('size.index');
        }
    }
}
