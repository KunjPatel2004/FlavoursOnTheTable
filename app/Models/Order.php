<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'session_id', 'customer_name', 'mobile', 'address', 'total_price', 'status'];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function orderItems()
    {
    return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

