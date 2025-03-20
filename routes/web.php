<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\CartController;


Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers\Front')->group(function(){
    
    Route::get('/',[IndexController::class,'home']);
    Route::match(['get','post'],'/login',[IndexController::class,'login']); 
   Route::get('/register',[IndexController::class,'register']);
   Route::get('/available_cooks',[IndexController::class,'AvailableCooks']);
   Route::get('/cooks/{id}/menu', [IndexController::class, 'Menu'])->name('cooks.menu');

   Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
   Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
   Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
   Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
   Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

});
    

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    
   
    Route::match(['get','post'],'login','AuthController@login');
    Route::match(['get','post'],'registration','AuthController@registration');
    Route::group(['middleware'=> ['admin']],function(){          //To protect the routes
        Route::get('logout',"AuthController@logout");
        Route::get('dashboard','AdminController@dashboard');
        Route::match(['get','post'],'update_password','AdminController@UpdatePassword');
        Route::post('check-current-password','AdminController@checkCurrentPassword');
        Route::match(['get','post'],'update-details','AdminController@UpdateDetails');
        Route::get('order_statistics','AdminController@Order_statistics');
        Route::match(['get','post'],'profile-details','AdminController@Profile_details');

       
        
        //Customer Details
        Route::match(['get','post'],'customer-details','AdminController@CustomerDetails');
        Route::post('update-customer-page-status','AdminController@updatecustomerstatus');
        Route::match(['get','post'],"add-edit-customer-details/{id?}",'AdminController@add_edit_customerdetails');
        Route::get("delete-customer/{id?}",'AdminController@delete_customer');


        //Cook Details
        Route::match(['get','post'],'food_items','CookController@Food_items');
        Route::match(['get','post'],"add-edit-food-item/{id?}",'CookController@Add_edit_fooditem');
        Route::get("delete-fooditem/{id?}",'CookController@delete_fooditem');
        Route::match(['get','post'],'cook-details','AdminController@CookDetails');
        Route::match(['get','post'],"add-edit-cook-details/{id?}",'AdminController@add_edit_cookdetails');
        Route::get("delete-cook-detail/{id?}",'AdminController@delete_cook');
        Route::match(['get','post'],'manage_order','CookController@Manage_Orders');
        Route::get("delete-orderdetail/{id?}",'CookController@delete_order');
        Route::match(['get','post'],"view-order-details/{id?}",'CookController@view_order');
        Route::post('update-status','CookController@updateorderstatus');
       
        
     });
     

    Route::get('test','AdminController@test');

});
