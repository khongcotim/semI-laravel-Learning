<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'Payments';
    protected $fillable = [
        'method',
        'amount',
        'id_customer',
        'who_except'
    ];
    public $timestamps = false;
    use HasFactory;
}
