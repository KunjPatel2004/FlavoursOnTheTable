<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\FoodItem;
use Auth;
use Session;
use Image;
use Hash;

class CookController extends Controller
{
    public function Food_items() {
        // $foods = Food::where('cook_id', auth()->id())->get();
        Session::put('page','food_item');
        $Fooditem = FoodItem::where('cook_id',auth('admin')->id())->get();
        return view('admin.cook.food_items')->with(compact('Fooditem'));
    }

   
    public function Add_edit_fooditem(Request $request,$id=null){
        Session::put('page','food_item');
        if($id==""){
            $title = "Add Food Item";
            $fooditempage = new FoodItem;
            $message = "Food item added successfully";
        }else{
            $title = "Edit food item";
            $fooditempage = FoodItem::find($id);             //Takes current CMS Page data for updation
            $message = "Food item updated successfully";
        }

        // $request->validate($rules,$customMessages)
        if($request->isMethod('post')){
            //  echo "<prev>"; print_r($data); die;
            $rules=$request->validate([
                'cook_id'=>'required',
                'name'=>'required',
                'description'=> 'required',
                'image'=> 'required',
                'status'=>'required'
            ]);
            $customMessages=$request->validate([
                'cook_id.required'=>'Cook id is required', 
                'name.required'=>'Food name is required', 
                'description.required'=>'Page Description is required',
                'image.required'=>'Page URL is required',
                'status.required'=>'Status is required',
            ]);
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension= $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    // $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/fooditems/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName= $data['current_image'];
            }else{
                $imageName= '';
            }
            $data = $request->all();
            $fooditempage->cook_id = $data['cook_id'];
            $fooditempage->name = $data['name'];
            $fooditempage->description = $data['description'];
            $fooditempage->price = $data['price'];
            $fooditempage->image = $data['image'];
            $fooditempage->status = $data['status'];
            $fooditempage->save();
            return redirect('admin/food_items')->with('success message',$message);
        }
        return view('admin.cook.add_edit_fooditems')->with(compact('title','fooditempage'));
    }
}
