<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Session;
use Image;
use Hash;

class AuthController extends Controller
{
    // public function register(Request $request){
    //     return view('admin.register');
    // }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo"<prev>"; print_r($data); die;

            $rules=[
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages=[
                'email.required' =>'Email is Required',
                'email.email' =>'Valid email is required',
                'password.required' =>'Password is required',
            ];
            $request->validate($rules,$customMessages);
             if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){

                //Remember Admin email and passwords with cookies
                if(isset($data['remember']) && !empty($data['remember'])){
                    setcookie("email",$data['email'],time()+60);
                    Setcookie("password",$data['password'],time()+60);
                }else{
                    setcookie("email","");
                    setcookie("password","");
                }


                return redirect("admin/dashboard");
                 
            }else{
                return redirect()->back()->with("error message","Invalid Email or Password");
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect("admin/login");
    }


    public function registration(Request $request,$id=null){
        if($id==""){
        $register = new Admin;
        $message = "User register successfully";
        }
        
        if($request->isMethod('post')){
            $rules = $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=> 'required',
                'retypepassword'=> 'required',
            ]);

            $customMessages = $request->validate([
                'name.required'=>'Name is required',
                'email.required'=>'Email is required',
                'password.required'=> 'Password is required',
                'retypepassword.required'=> 'Password is required',
            ]);
            $data = $request->all();
            $register->name = $data['name'];
            $register->email = $data['name'];
            $register->mobile = $data['mobile'];
            $register->password = $data['password'];
            $register->retypepassword = $data['retypepassword'];
            $register->save();
            return redirect("admin/login")->back()->with('success message',$message);
        }
        return view('admin.register')->with(compact('register','message'));
    }
}
