<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "country";
    public $timestamps = false;
    protected $fillable = ['country_id', 'country_name'];

    public function Product()
    {
        return $this->hasMany(Product::class, "country_id", "country_id");
    }
}
