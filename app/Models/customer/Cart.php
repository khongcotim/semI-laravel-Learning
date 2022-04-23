<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'Cart';
    protected $fillable = [
        'id_customer',
        'address',
        'country',
        'city',
        'time',
        'price',
        'count_adults',
        'count_children',
    ];
    public $timestamps = false;
    use HasFactory;
}
