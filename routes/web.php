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
        Route::get('order_statistics','AdminController@Order_statistics');
        Route::match(['get','post'],'cook-details','AdminController@CookDetails');
        
        //Customer Details
        Route::match(['get','post'],'customer-details','AdminController@CustomerDetails');
        Route::post('update-customer-page-status','AdminController@updatecustomerstatus');
        Route::match(['get','post'],"edit-customer-details/{id?}",'AdminController@edit_customerdetails');
        Route::get("delete-customer/{id?}",'AdminController@delete_customer');


        //Cook Details
        Route::match(['get','post'],"add-edit-cook-details/{id?}",'CookController@Add_edit_fooditem');
        Route::get("delete-fooditem/{id?}",'CookController@delete_fooditem');



        //Cook Controller
        Route::match(['get','post'],'food_items','CookController@Food_items');
        Route::match(['get','post'],"add-edit-food-item/{id?}",'CookController@Add_edit_fooditem');
        Route::match(['get','post'],'manage_order','CookController@Manage_Orders');


     });
});



