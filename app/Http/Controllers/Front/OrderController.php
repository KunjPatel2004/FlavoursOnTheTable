<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
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
    
            return view('front.checkout', compact('cartItems', 'totalPrice'));
    }

    public function placeOrder(Request $request) {
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
    
        // Store Order
        $order = Order::create([
            'user_id' => $user_id,
            'session_id' => $user_id ? null : $session_id,
            'customer_name' => $request->customer_name ?? null,
            'mobile' => $request->mobile ?? null,
            'address' => $request->address ?? null,
            'total_price' => $cartItems->sum('subtotal'),
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
}
