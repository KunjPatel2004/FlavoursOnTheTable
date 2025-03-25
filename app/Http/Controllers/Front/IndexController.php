<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodItem;
use App\Models\Admin;
use Auth;
use Session;

class IndexController extends Controller
{
    public function home(){
       Session::put('page','home');
        return view('front.index');
    }

    public function AvailableCooks(){
       Session::put('page','menu');
       $foods =FoodItem::all();
       $cooks =Admin::where('role','cook')->get();  
        return view('front.available_cooks')->with(compact('foods','cooks'));
    }

    public function Menu($cook_id)
    {
       Session::put('page','menu');
        $selectedCook = Admin::findOrFail($cook_id);
        $menuItems = FoodItem::where('cook_id', $cook_id)->get();
    
        return view('front.menu', compact('selectedCook', 'menuItems'));
    }
}
