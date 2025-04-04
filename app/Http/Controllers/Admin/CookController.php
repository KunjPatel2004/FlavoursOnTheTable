<?php
 

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\FoodItem;
use App\Models\Order;
use Session;
use Image;


class CookController extends Controller
{
    public function Food_items($id) {
        Session::put('page','food_item');
         $cook = Admin::where('id', $id)->where('role', 'cook')->firstOrFail();  
         $Fooditem = FoodItem::where('cook_id',$id)->get();
        return view('admin.cook.food_items')->with(compact('Fooditem','cook'));
    }

   
    public function Add_edit_fooditem(Request $request,$id=null){
        Session::put('page','food_item');
        if($id==""){
            $title = "Add Food Item";
            $fooditempage = new FoodItem;
            $message = "Food item added successfully";
        }else{
            $title = "Edit food item";
            $fooditempage = FoodItem::find($id);             
            $message = "Food item updated successfully";
        }
        
        if($request->isMethod('post')){
            $data = $request->all();
            //  echo "<prev>"; print_r($data); die;
            $rules=$request->validate([
                'cook_id'=>'required',
                'name'=>'required',
                'description'=> 'required',
                'image'=> 'image',
                'status'=>'required'
            ]);
            $customMessages=$request->validate([
                'cook_id.required'=>'Cook id is required', 
                'name.required'=>'Food name is required', 
                'description.required'=>'Page Description is required',
                'image.image'=>'Valid image is required',
                'status.required'=>'Status is required',
            ]);
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension= $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/fooditems/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName= $data['current_image'];
            }
            else{
                $imageName= '';
            }
           
            $fooditempage->cook_id = $data['cook_id'];
            $fooditempage->name = $data['name'];
            $fooditempage->description = $data['description'];
            $fooditempage->price = $data['price'];
            $fooditempage->image = $imageName;
            $fooditempage->status = $data['status'];
            $fooditempage->save();
            return redirect()->route('admin.fooditems', $fooditempage->cook_id)->with('success message',$message);
        }
        return view('admin.cook.add_edit_fooditems')->with(compact('title','fooditempage'));
    }

    public function delete_fooditem($id){
        FoodItem::where('id',$id)->delete();
        return redirect()->back()->with('success message','Food item deleted successfully!');
    }
   
    public function Manage_Orders(){
        Session::put('page','manage_orders');
        
         $user = auth('admin')->user(); // Get the logged-in user

        if ($user->role === 'admin') {
            
            $manageorder = Order::with('orderItems.foodItem', 'customer')->get();
        } elseif ($user->role === 'cook') {
            
            $manageorder = Order::whereHas('orderItems.foodItem', function ($query) use ($user) {
                $query->where('cook_id', $user->id);
            })->with('orderItems.foodItem')->latest()->get();
        } else {
            return abort(403, 'Unauthorized action.');
        }
      
        return view('admin.order.manage_orders')->with(compact('manageorder'));
    }

    public function view_order(Request $request,$id=null){
        Session::put('page','manage_orders');
        $title = "View Order Details"; // Set the page title
        
       // Fetch order details from the database
       $orderpage = Order::where('id', $id)->first();
        return view('admin.order.view_order')->with(compact('title','orderpage'));
    }

    public function delete_order($id){
        Order::where('id',$id)->delete();
        return redirect()->back()->with('success message','Order deleted successfully!');
    }

    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id);

        if ($order) {
            $order->status = $request->status;
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'new_status' => $order->status
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Order not found'
        ]);
    }

    


    
}
