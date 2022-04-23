<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'Reply';
    protected $fillable = [
        'reply_to',
        'customer_reply',
        'admin_reply',
        'who_eccept',
        'type',
        'contents'
    ];
    public $timestamps = false;
    use HasFactory;
}
