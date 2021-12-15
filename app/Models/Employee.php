<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employee";
    public $timestamps = false;
    protected $fillable = ['employee_id', 'name', 'gender', 'date_of_birth', 'phone', 'email', 'address'];

    public function Order()
    {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }
}
