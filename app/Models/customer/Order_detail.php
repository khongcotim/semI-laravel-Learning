<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'Order_detail';
    protected $fillable = [
        'id_tour',
        'id_customer',
        'id_payment',
        'id_tour_guild',
        'id_discount',
        'hotel_id',
        'id_vehicle',
        'id_service',
        'total_price',
        'id_order',
    ];
    public $timestamps = false;
    use HasFactory;
}
