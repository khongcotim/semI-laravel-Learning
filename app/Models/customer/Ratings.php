<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{ 
    protected $table = 'Ratings';
    protected $fillable = [
        'id_customer',
        'id_tour',
        'rating_star'
    ];
    public $timestamps = false;
    use HasFactory;
}
