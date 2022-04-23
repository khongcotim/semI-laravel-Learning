<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'Banner';
    protected $fillable = [
        'image',
        'page',
        'links',
        'title',
        'status',
        'id_tour'
    ];
    public $timestamps = false;
    use HasFactory;
}
