<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Auth;

class AuthController extends Controller
{
   // Customer Login
   public function login(Request $request)
   {
       if ($request->isMethod('post')) {
           $request->validate([
               'email' => 'required|email|max:255',
               'password' => 'required|max:30'
           ]);

           $customer = Admin::where('email', $request->email)
                            ->where('role', 'customer') // Only allow customers to log in
                            ->first();

           if ($customer && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
               return redirect("/")->with('success_message', 'Login Successful!');
           } else {
               return redirect()->back()->with("error_message", "Invalid Email or Password");
           }
       }
       return view('front.login'); // Customer login view
   }

   // Customer Logout
   public function logout()
   {
       Auth::logout();
       return redirect("/customer/login")->with('success_message', 'You have logged out.');
   }

   // Customer Registration
   public function register(Request $request)
   {
       if ($request->isMethod('post')) {
           $request->validate([
               'name' => 'required',
               'email' => 'required|email|unique:admins',
               'password' => 'required|confirmed|min:6'
           ]);

           $customer = new Admin();
           $customer->name = $request->name;
           $customer->email = $request->email;
           $customer->password = Hash::make($request->password); // Hashing the password
           $customer->mobile = $request->mobile;
           $customer->role = 'customer'; // Assign role as customer
           $customer->save();

           return redirect("customer/login")->with('success_message', 'Registration successful. Please login.');
       }

       return view('front.register');
   }
}
