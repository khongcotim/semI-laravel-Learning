<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'Vehicle';
    protected $fillable = ['name','price','status'];
    public $timestamps = false;
    use HasFactory;
}
