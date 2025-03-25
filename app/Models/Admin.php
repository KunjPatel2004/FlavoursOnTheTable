<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'role', 'image',
        'home_address', 'work_address', 'address_1', 'address_2', 'status'
    ];

   
    protected $hidden = [
        'password',
    ];

}
