<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('layouts.pages.category.index',['categories'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('layouts.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categoryRequest = $request->all();
        $categories = new Category();
        $categories->category_name = $categoryRequest['category_name'];
        $categories->save();
        return redirect()->route('category.index');
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
    public function edit(Category $id)
    {
        //

        return view('layouts.pages.category.create',['category'=>$id]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $id)
    {
        //
        $categories = $id ;
        $categories->category_name =$request->category_name;
        $categories->save();
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $id)
    {
        if($id->delete()){
            return redirect()->route('category.index');
        }
    }
}
