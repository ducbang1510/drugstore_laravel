<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    public $timestamps = false;
    protected $fillable = ['category_id', 'category_name'];

    public function Product()
    {
        return $this->hasMany(Product::class, "category_id", "category_id");
    }
}
