<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'Tour';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'distant',
        'des_photos',
        'from',
        'to',
        'time',
        'map',
        'address',
        'tour_code',
        'service',
        'price',
        'description',
        'limit',
        'ordered',
        'status',
        'category_id',
        'vehicle_id',
        'hotel_id'
    ];
    public function getCateTourByID($id_cate)
    {
        $cate_product = Tour::join('category', 'category.id', '=', 'tour.category_id')
                            ->select('tour.*', 'category.name as nameCate')
                            ->where('tour.category_id',$id_cate)
                            ->get();
        return $cate_product;
    }
    public $timestamps = false;
    use HasFactory;
}
