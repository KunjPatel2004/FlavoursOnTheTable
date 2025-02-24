<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


    

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    
    Route::match(['get','post'],'login','AuthController@login');
    Route::match(['get','post'],'register','AuthController@register');
    Route::group(['middleware'=> ['admin']],function(){          //To protect the routes form opening without login
        Route::get('logout',"AuthController@logout");
        Route::get('dashboard','AdminController@dashboard');
        Route::match(['get','post'],'update_password','AdminController@UpdatePassword');
        Route::post('check-current-password','AdminController@checkCurrentPassword');
        Route::match(['get','post'],'update-details','AdminController@UpdateDetails');
        Route::match(['get','post'],'update-customer-details','AdminController@UpdateCustomerDetails');
        Route::get('monitor_orders','AdminController@Monitor_Order');
        Route::match(['get','post'],'cook-details','AdminController@CookDetails');
        


        //Cook Controller
        Route::match(['get','post'],'food_items','CookController@Food_items');
        Route::match(['get','post'],"add-edit-food-item/{id?}",'CookController@Add_edit_fooditem');
        

     });
});



