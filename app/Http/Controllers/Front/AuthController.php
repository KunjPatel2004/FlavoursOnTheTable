<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Validator;
use Session;
use Auth;
use Hash;

class AuthController extends Controller
{
   // Customer Login
   public function login(Request $request)
   {
       if ($request->ajax()) {
          $data = $request->all();

          $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:250|exists:users|lowercase|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
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
       return view('front.customer.login'); 
   }

   // Customer Registration
    public function register(Request $request){
        if ($request->ajax()) {
 
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:250|unique:users|lowercase|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required|string|min:6',
        ], [
            'email.email' => 'Please enter a valid email',
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
       return view('front.customer.register');
    }

      // Customer Logout
    public function logout(Request $request){
          Auth::logout();
           session()->forget('cartItem');
          $request->session()->invalidate();
          $request->session()->regeneratetoken();

          return redirect("/customer/login")->with('success_message', 'You have logged out.');
    }

    public function CustomerAccount(Request $request){
        Session::put('page', 'update_account');
        if($request->ajax()){
            $data = $request->all();

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:150',
                'address' => 'required|string|max:150',
                'city' => 'required|string|max:150',
                'state' => 'required|string|max:150',
                'pincode' => 'required|string|max:150',
                'mobile' => 'required|numeric|digits:10',
            ]);

            if($validator->passes()){
                User::where('id',Auth::user()->id)->update(['name'=>$data['name'],
                'address'=>$data['address'],'city'=>$data['city'],'state'=>$data['state'],
                'pincode'=>$data['pincode'],'mobile'=>$data['mobile'],]);

                return response()->json(['status'=>true,'type'=>'success','message'=>'Your details are updated successfully!']);

            }else{
                return response()->json(['status'=>false,'type'=>'validation',
                'errors'=>$validator->messages()]);
            }

        }else{   
                return view('front.customer.customer_account');
        }
    }

    public function UpdatePassword(Request $request){
        Session::put('page', 'update_password');
        if($request->ajax()){
            $data = $request->all();
            $validator = Validator::make($request->all(),[
                'current_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ]);

            if($validator->passes()){
                //Password entered by user
                $current_password = $data['current_password'];
                
                //Password from users table
                $checkPassword = User::where('id',Auth::user()->id)->first();

                //Compare current password
                if(Hash::check($current_password,$checkPassword->password)){
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($data['new_password']);
                    $user->save();

                    return response()->json(['type'=>'success','message'=>'Your password is updated successfully!']);

                }else{
                    return response()->json(['type'=>'incorrect','message'=>'Your current password is incorrect!']);
                }

            }else{
                return response()->json(['type'=>'validation','errors'=>$validator->messages()]);
            }

        }else{
            return view('front.customer.update_password');
        }

    }
}
