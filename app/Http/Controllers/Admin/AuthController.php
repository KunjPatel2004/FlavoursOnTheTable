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
    public function register(Request $request){
        return view('admin.register');
    }

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
}
