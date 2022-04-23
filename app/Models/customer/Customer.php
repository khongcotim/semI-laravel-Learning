<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Customer extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'Customer';
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'phone',
        'password',
        'address',
        'id_card',
        'status'
    ];
    public $timestamps = false;
    use HasFactory;
}
