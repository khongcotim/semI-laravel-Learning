<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{   
    protected $table = 'Discount_code';
    protected $fillable = [
        'name',
        'percent_reduce',
        'limit',
        'time',
        'who',
        'id_tour'
    ];
    public $timestamps = false;
    use HasFactory;
}
