<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'Feedback';
    protected $fillable = [
        'solution',
        'answer',
        'image',
        'customer_id',
        'admin_id',
        'who_except'
    ];
    use HasFactory;
}
