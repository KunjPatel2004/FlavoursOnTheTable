<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use App\Models\OrderItem;
use Auth;
use Session;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = auth()->id();
        $session_id = Session::getId();

        // Get cart items for user or guest
        $cartItems = Cart::where(function ($query) use ($user_id, $session_id) {
            if ($user_id) {
                $query->where('user_id', $user_id);
            } else {
                $query->where('session_id', $session_id);
            }
        })->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $totalPrice = $cartItems->sum('subtotal');

        // Get user details if logged in
        $user = $user_id ? User::find($user_id) : null;
         
        // Fetch addresses for logged-in user
        $defaultAddress = $user ? $user->address : null;
        $otherAddresses = $user ? Address::where('user_id', $user_id)->where('id', '!=', $defaultAddress)->get() : collect();

        return view('front.checkout', compact('cartItems', 'totalPrice', 'user', 'defaultAddress', 'otherAddresses'));
    }

    public function placeOrder(Request $request)
    {
        $user_id = auth()->id();
        $session_id = Session::getId();

        // Get cart items
        $cartItems = Cart::where(function ($query) use ($user_id, $session_id) {
            if ($user_id) {
                $query->where('user_id', $user_id);
            } else {
                $query->where('session_id', $session_id);
            }
        })->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $user = $user_id ? User::find($user_id) : null;

        
        $selectedAddress = $request->address ?? ($user ? $user->address : null);
        
        $order = Order::create([
            'user_id' => $user_id,
            'session_id' => $user_id ? null : $session_id,
            'customer_name' => $user ? $user->name : $request->customer_name,  
            'mobile' => $user ? $user->mobile : $request->mobile,
            'address' => $selectedAddress,
            'total_price' => $cartItems->sum('subtotal'),
            'payment_type' => $request->payment, 
            'status' => 'Order Placed'
        ]);

        // Store Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'food_item_id' => $item->food_id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'subtotal' => $item->subtotal
            ]);
        }

        // Clear Cart
        Cart::where(function ($query) use ($user_id, $session_id) {
            if ($user_id) {
                $query->where('user_id', $user_id);
            } else {
                $query->where('session_id', $session_id);
            }
        })->delete();

        return redirect()->route('cart')->with('success', 'Order placed successfully.');
    }

    public function myOrders()
    {
        $user_id = auth()->id();

        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Please log in to view your orders.');
        }

        // Fetch orders of logged-in user
        $orders = Order::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->with('orderItems.foodItem')
            ->get();

        return view('front.my-orders', compact('orders'));
    }
}
