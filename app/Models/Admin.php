<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    public function isCook(){
        return $this->role ==='cook';
    }
    public function isAdmin(){
        return $this->role ==='admin';
    }

    public function isCustomer(){
        return $this->role ==='customer';
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

   
    protected $hidden = [
        'password',
    ];

}
