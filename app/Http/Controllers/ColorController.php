<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $colors = Color::all();
        return view('layouts.pages.color.index',["colors"=>$colors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('layouts.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $colorRequest = $request->all();
        $colors = new Color();
        $colors->color = $colorRequest['color_name'];
        $colors->color_hex = $colorRequest['color_hex'];
        $colors->save();
        return redirect()->route('color.index');
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
    public function edit(Color $id)
    {
        //
        return view('layouts.pages.color.create',['color'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $id)
    {
        //
        $colors = $id ;
        $colors->color =$request->color_name;
        $colors->color_hex = $request->color_hex;
        $colors->save();
        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Color $id)
    {
        //
        if($id->delete()){
            return redirect()->route('color.index');
        }
    }
}
