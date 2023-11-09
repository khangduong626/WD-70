<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;
    protected $table = 'products_detail';
    protected $primaryKey = 'product_detail_id';

    protected $fillable = [
        'product_detail_id',
        'description',
        'stock_quantity',
        'price',
        'images',
        'color_id',
        'size_id',
        'product_id',
    ];
    public function colors(){
        return $this->belongsTo(Color::class,'color_id','color_id');
    }
    public function sizes(){
        return $this->belongsTo(Size::class,'size_id','size_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
