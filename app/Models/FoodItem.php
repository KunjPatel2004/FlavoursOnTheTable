<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
   protected $guard='food_item';
   use HasFactory;

   protected $table = 'food_items'; // Ensure this matches your database table name
   protected $fillable = ['name','description', 'image', 'cook_id', 'price','status'];
}
