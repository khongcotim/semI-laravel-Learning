<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'Favorites';
    protected $fillable = [
        'id_customer',
        'id_tour'
    ];
    public $timestamps = false;
    use HasFactory;
}
