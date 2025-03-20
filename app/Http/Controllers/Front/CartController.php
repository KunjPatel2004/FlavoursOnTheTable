<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\FoodItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
class CartController extends Controller
{
      // Show Cart Page
      public function index()
      {
          return view('cart.index');
      }
  
      // Add to Cart (AJAX)
      public function addToCart(Request $request)
      {
          $food = FoodItem::findOrFail($request->id);
          $cart = session()->get('cart', []);
  
          if (isset($cart[$food->id])) {
              $cart[$food->id]['quantity'] += 1;
          } else {
              $cart[$food->id] = [
                  "name" => $food->name,
                  "price" => $food->price,
                  "quantity" => 1,
                  "image" => $food->image,
              ];
          }
  
          session()->put('cart', $cart);
  
          return response()->json([
              'message' => 'Food added to cart!',
              'cart_count' => count($cart)
          ]);
      }
  
      // Update Cart Item Quantity (AJAX)
      public function updateCart(Request $request)
      {
          $cart = session()->get('cart', []);
          
          if (isset($cart[$request->id])) {
              $cart[$request->id]['quantity'] = $request->quantity;
              session()->put('cart', $cart);
          }
  
          return response()->json(['message' => 'Cart updated successfully!', 'cart' => $cart]);
      }
  
      // Remove Item from Cart (AJAX)
      public function removeFromCart(Request $request)
      {
          $cart = session()->get('cart', []);
  
          if (isset($cart[$request->id])) {
              unset($cart[$request->id]);
              session()->put('cart', $cart);
          }
  
          return response()->json(['message' => 'Item removed from cart!', 'cart_count' => count($cart)]);
      }
  
      // Clear Cart (AJAX)
      public function clearCart()
      {
          session()->forget('cart');
          return response()->json(['message' => 'Cart cleared!', 'cart_count' => 0]);
      }
}
