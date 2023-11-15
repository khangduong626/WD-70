<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id',
        'product_name',
        'brand_id',
        'category_id',
        'price',
        'img_url',
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
    
    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id','brand_id');
    }
}
