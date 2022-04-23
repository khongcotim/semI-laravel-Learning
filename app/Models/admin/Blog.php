<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'Blog';
    protected $fillable = [
        'title',
        'slug',
        'admin_id',
        'image',
        'contents',
        'status',
        'who_accept',
        'customer_id'
    ];
    public $timestamps = false;
    use HasFactory;
}
