<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = 'Slides';
    protected $fillable = [
        'position',
        'title',
        'image',
        'link',
        'status',
        'max'
    ];
    public $timestamps = false;
    use HasFactory;
}
