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
        $cooks = Admin::where('role','cook')->where('status', 1)->get(); // Fetch active cooks
        $popularDishes = FoodItem::orderBy('id', 'DESC')->limit(6)->get();
        return view('front.index',compact('cooks','popularDishes'));
    }

    public function AvailableCooks(){
       Session::put('page','menu');
       $foods =FoodItem::all();
       $cooks =Admin::where('role','cook')->get();  
        return view('front.available_cooks')->with(compact('foods','cooks'));
    }

    public function Menu($cook_id)
    {
       
        $selectedCook = Admin::findOrFail($cook_id);
        $menuItems = FoodItem::where('cook_id', $cook_id)->get();
    
        return view('front.menu', compact('selectedCook', 'menuItems'));
    }

    public function PrivacyPolicy(){
        return view('front.layout.privacy-policy');
    }

    public function Terms_Conditions(){
        return view('front.layout.terms&conditions');
    }

    public function Help_Support(){
        return view('front.layout.help&support');
    }

    public function Cookies(){
        return view('front.layout.cookies');
    }
}
