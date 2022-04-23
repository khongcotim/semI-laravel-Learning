<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'Orders';
    protected $fillable = [
        'id_customer',
        'address',
        'country',
        'city',
        'time',
        'price',
        'count_adults',
        'count_children',
        'status'
    ];
    public $timestamps = false;
    use HasFactory;
}
