<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    protected $table = 'Tour_guide';
    protected $fillable = ['name','phone','avatar','email','price','address','description','status','gender'];
    use HasFactory;
}
