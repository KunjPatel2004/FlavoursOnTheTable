<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\FoodItem;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Auth;
class CartController extends Controller
{
     // Display Cart
     public function viewCart() {
        $user_id = Auth::check() ? Auth::id() : null;
        $cartItems = Cart::where('user_id', $user_id)->get();
        return view('front.cart', compact('cartItems'));
    }
    
     // Add to Cart
    public function addToCart(Request $request) {
        $food = FoodItem::find($request->id);
        if (!$food) {
            return response()->json(['status' => 'error', 'message' => 'Food item not found']);
        }

        $user_id = Auth::check() ? Auth::id() : null;
        $existingCartItem = Cart::where('food_id', $food->id)->where('user_id', $user_id)->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->subtotal = $existingCartItem->quantity * $existingCartItem->price;
            $existingCartItem->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'food_id' => $food->id,
                'food_name' => $food->name,
                'price' => $food->price,
                'quantity' => 1,
                'subtotal' => $food->price
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'Food item added successfully']);
    }

    // Update Quantity
    public function updateCart(Request $request) {
        $cartItem = Cart::find($request->cart_id);
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
            return response()->json(['status' => 'success', 'message' => 'Cart updated']);
        }
        return response()->json(['status' => 'error', 'message' => 'Item not found']);
    }

    // Remove Item from Cart
    public function removeFromCart(Request $request) {
        $cartItem = Cart::find($request->cart_id);
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success message','Item removed');
        }
        return response()->json(['status' => 'error', 'message' => 'Item not found']);
    }
}
