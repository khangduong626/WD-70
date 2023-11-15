<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryController;
class ProductController extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product_id" => $this->product_id,
            "product_name" => $this->product_name,
            "brand_id" =>$this->brand_id,
            "category_id" =>$this->category_id,
            "price" =>$this->price,
            "img_url" =>$this->img_url,
            "created_at" =>$this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
