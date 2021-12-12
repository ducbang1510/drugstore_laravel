<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = "product_images";
    public $timestamps = false;
    protected $fillable = ['image_id', 'path', 'product_id'];

    public function Product() {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
