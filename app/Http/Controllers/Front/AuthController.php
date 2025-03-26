<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Validator;
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

   // Customer Registration
    public function register(Request $request){
        if ($request->ajax()) {
 
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:150',
                'email' => 'required|email|max:250|unique:users',
                'mobile' => 'required|numeric|digits:10',
                'password' => 'required|string|min:6',
            ],
            [
                'email.email'=> 'Please Enter a valid email',
            ]);

            if($validator->passes()){
                $data = $request->all();
                $customer = new User();
                $customer->name = $data['name'];
                $customer->mobile = $data['mobile'];
                $customer->email = $data['email'];
                $customer->password = bcrypt($data['password']);
                $customer->status = 1;
                $customer->save();

                if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                    $redirectUrl = url('/cart');
                    return response()->json(['status'=>true,'type'=>'success','redirectUrl'=>$redirectUrl]);
                }
            }else{
                return response()->json(['status'=>false,'type'=>'validation',
                'errors'=>$validator->messages()]);
            }
        }
       return view('front.register');
    }

      // Customer Logout
    public function logout(){
          Auth::logout();
          return redirect("/customer/login")->with('success_message', 'You have logged out.');
    }
}
