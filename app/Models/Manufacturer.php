<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = "manufacturer";
    public $timestamps = false;
    protected $fillable = ['manufacturer_id', 'company_name', 'phone', 'email', 'address'];

    public function Product()
    {
        return $this->hasMany(Product::class, "manufacturer_id", "manufacturer_id");
    }
}
