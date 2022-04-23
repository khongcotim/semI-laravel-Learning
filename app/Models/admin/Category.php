<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';
    protected $fillable = ['name','slug','status'];
    public $timestamps = false;
    use HasFactory;
}
