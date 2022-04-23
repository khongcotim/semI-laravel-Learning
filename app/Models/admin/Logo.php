<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = 'Logo';
    protected $fillable = ['logo','status'];
    use HasFactory;
}
