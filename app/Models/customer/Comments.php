<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'Comments';
    protected $fillable = [
        'id_customer',
        'id_tour',
        'id_blog',
        'contents',
        'status'
    ];
    public $timestamps = false;
    use HasFactory;
}
