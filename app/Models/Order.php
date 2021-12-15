<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";
    public $timestamps = false;
    protected $fillable = ['order_id', 'customer_id', 'employee_id', 'order_date', 'total_price'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public  function Product()
    {
        return $this->belongsToMany(Product::class,'order_details','product_id', 'order_id')->withPivot('quantity', 'unit_price');
    }
}
