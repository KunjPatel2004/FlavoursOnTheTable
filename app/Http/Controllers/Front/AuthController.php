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
       if ($request->ajax()) {
          $data = $request->all();

          $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:250|exists:users',
            'password' => 'required|min:6',
        ],
        [
            'email.exists'=> 'Email does not exists',
        ]);

        if($validator->passes()){

            //Remember email and password
            if(!empty($data['remember-me'])){
                setcookie("user-email",$data['email'],time()+3600);
                setcookie("user-password",$data['password'],time()+3600);
            }else{
                setcookie("user-email");
                setcookie("user-password");
            }

            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                $redirectUrl = url('/');
                return response()->json(['status' => true, 'type' => 'success', 'redirectUrl' => $redirectUrl]);
            
            }else{
                return response()->json(['status'=>false,'type'=>'incorrect',
                'message'=>'You entered wrong email or password!']);
            }
            
        }else{
            return response()->json(['status'=>false,'type'=>'error',
            'errors'=>$validator->messages()]);
        }

       }
       return view('front.login'); 
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
                    $redirectUrl = url('/customer/login?success= Registration successful! You can login now.');
                    return response()->json(['status' => true, 'type' => 'success', 'redirectUrl' => $redirectUrl]);
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

    public function CustomerAccount(){
    return view('front.customer_account');
    }
}
