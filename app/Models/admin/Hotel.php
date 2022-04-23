<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'Hotel';
    protected $fillable = ['name','price','address'];
    public $timestamps = false;
    use HasFactory;
}
