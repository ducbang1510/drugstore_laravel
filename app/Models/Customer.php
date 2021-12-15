<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customer";
    public $timestamps = false;
    protected $fillable = ['customer_id', 'name', 'gender', 'address', 'email', 'phone'];

    public function Order()
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }
}
