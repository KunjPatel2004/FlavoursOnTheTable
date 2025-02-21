<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Session;
use Image;
use Hash;

class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }

    

    public function UpdatePassword(Request $request){
        Session::put('page','update_password');

        if($request->isMethod('post')){
            $data = $request->all();
            //Check if current password is correct
            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
               //Check if new password and confirm password are matching
               if($data['new_pwd']==$data['confirm_pwd']){
                 //Update new password
                 Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                 return redirect()->back()->with('success message',' Your password has been updated successfully');
               }else{
                return redirect()->back()->with('error message','New password and retype password does not match');
               }
            }else {
                return redirect()->back()->with('error message','Your current password is incorrect');
            }
        }
        return view('admin.update_password'); 
    }
    
    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password))  {
            return "true";
        }else{
            return "false";
        }
    }

    public function UpdateDetails(Request $request){
        Session::put('page','update_details');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
             $rules =$request->validate ([
                'admin_name'=>'required|max:255',
                'admin_mobile'=> 'required|numeric|digits:10',
                'admin_image'=>'image',
             ]);

             $customMessages=$request->validate([
                'admin_name.required'=> 'Name is required',
                // 'admin_name.regex'=> 'Valid name is required',
                'admin_name.max'=> 'Valid name is required',
                'admin_mobile.required'=> 'Mobile is required',
                'admin_mobile.numeric'=> 'Valid mobile is required',
                'admin_mobile.digits'=> 'Valid mobile is required',
                'admin_image.image'=> 'Valid image is required',
             ]);

            // $this->validate($request,$rules,$customMessages);

            //Upload Admin Image
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension= $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/photos/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName= $data['current_image'];
            }else{
                $imageName= '';
            }
           

           //Update Admin Details
           Admin::where('email',Auth::guard('admin')->user()->email)->update(
            ['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);

            return redirect()->back()->with('success message',
            'Admin details has been updated successfully');
        }
        return view('admin.update_details');
    }

    public function CookDetails(){
        Session::put('page','cook_details');
        $cookdetails = Admin::where('role','cook')->get();
        return view('admin.manage_cook')->with(compact('cookdetails'));
     
    }

    public function UpdateCustomerDetails(){
        Session::put('page','manage_customer');
        return view('admin.manage_customers');

    }
    public function Monitor_Order(){
        Session::put('page','monitor_order');
        return view('admin.monitor_orders');

    }
}
