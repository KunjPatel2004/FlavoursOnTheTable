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
    public function addToCart(Request $request)
    {
        $food = FoodItem::find($request->food_id);
        if (!$food) {
            return response()->json(['status' => 'error', 'message' => 'Food item not found']);
        }

        $session_id = Session::getId();
        $user_id = auth()->check() ? auth()->id() : null;

        // Check if the item already exists in the cart
        $cartItem = Cart::where(function ($query) use ($user_id, $session_id) {
            if ($user_id) {
                $query->where('user_id', $user_id);
            } else {
                $query->where('session_id', $session_id);
            }
        })->where('food_id', $food->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->subtotal = $cartItem->quantity * $food->price;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'session_id' => $session_id,
                'food_id' => $food->id,
                'food_name' => $food->name,
                'price' => $food->price,
                'quantity' => 1,
                'subtotal' => $food->price
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Item added to cart!',
            'cart_count' => Cart::where('session_id', $session_id)->orWhere('user_id', $user_id)->count()
        ]);
    }

    public function viewCart()
    {
        $session_id = Session::getId();
        $user_id = auth()->check() ? auth()->id() : null;

        $cartItems = Cart::where(function ($query) use ($user_id, $session_id) {
            if ($user_id) {
                $query->where('user_id', $user_id);
            } else {
                $query->where('session_id', $session_id);
            }
        })->get();

        $totalPrice = $cartItems->sum('subtotal');
        return view('front.cart', compact('cartItems','totalPrice'));
    }

    public function updateCart(Request $request)
    {
        $cartItem = Cart::find($request->cart_id);
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();

            return response()->json(['status' => 'success', 'message' => 'Cart updated successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'Cart item not found']);
    }

    public function removeItem(Request $request)
    {
        $cartItem = Cart::find($request->cart_id);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['status' => 'success', 'message' => 'Item removed from cart']);
        }

        return response()->json(['status' => 'error', 'message' => 'Item not found']);
    }
        
}
