<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    public $timestamps = false;
    protected $fillable = ['product_id', 'product_name', 'unit', 'price', 'quantity', 'created_date',
        'product_Ingredient', 'dosage_forms', 'is_prescription_drugs', 'warning', 'manufacturer_id', 'country_id',
        'description', 'effect', 'dosage', 'category_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class, "category_id", "category_id");
    }

    public function Manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, "manufacturer_id", "manufacturer_id");
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, "country_id", "country_id");
    }

    public function ProductImages()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'product_id');
    }

    public  function Order()
    {
        return $this->belongsToMany(Order::class,'order_details','product_id', 'order_id')->withPivot('quantity', 'unit_price');
    }
}
