<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $table = 'sellers';
    
    protected $fillable = [
        'name',
        'profile_image',
        'email',
        'password',
        'store_name',
        'phone',
        'address',
        'national_id',
        'date_of_birth',
        'status',
    ];
}
