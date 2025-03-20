<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
   protected $guard='food_item';

   public function cart()
{
    return $this->hasMany(Cart::class);
}
}
