<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product_detail;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
class ProductDetail extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $id)
    {
        //
        // $product_detail = Product_detail::select('product_id','color_id','size_id','images','stock_quantity','price','description','updated_at')
        // ->where('product_id',$id->product_id)
        // ->with('colors:color_id,color','sizes:size_id,size')
        // ->get();
        // return response()->json($product_detail, Response::HTTP_OK);

        
        $products_detail = DB::table('products_detail')
        ->join('products', function(JoinClause $join){
            $join->on('products_detail.product_id','=','products.product_id');
        })
        ->join('colors', function(JoinClause $join){
            $join->on('products_detail.color_id','=','colors.color_id');
        })
        ->join('sizes', function(JoinClause $join){
            $join->on('products_detail.size_id','=','sizes.size_id');
        })

        ->where('products_detail.product_id','=',$id->product_id)
        ->select('products.*','sizes.size','colors.color','products_detail.*')
        ->get();
        
        return response()->json(['data'=>$products_detail], Response::HTTP_OK);
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
    public function show(string $id)
    {
        //
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
