<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Auth
 */
Route::group(['controller'=>AdminAuthController::class],function(){
    Route::get('auth/login','login')->middleware('guest')->name('login');
    Route::get('auth/signup','signup')->name('signup');

    Route::get('auth/admin/logout', 'admin_logout')->name('admin_logout');
    Route::get('auth/client/logout', 'client_logout')->name('client_logout');

    Route::get('/signup/getjobs','getjobs')->name('getjobs');

    Route::post('/check','check')->name('check');
    Route::post('/signup','create')->name('create');
});

/**
 * Craftsmen Route
 */
Route::group(['prefix'=>'admin','controller'=>AdminController::class,'middleware'=>'auth'],function(){
    Route::get('/','index')->name('admin.home');
    Route::get('/orders','orders')->name('admin.orders');

    Route::get('order/complete','completeOrder')->name('admin.complete.order');
    Route::get('order/reject','rejectOrder')->name('admin.reject.order');
    Route::get('order/client/{client_id}','client')->name('admin.order.client');
});



/**
 * Client Route
 */
Route::get('/',[ClientController::class,'index'])->name('client.home');

Route::group(['prefix'=>'client','controller'=>ClientController::class,'middleware'=>'auth:client'],function(){
    Route::get('admin_list/{job_id}','adminList')->name('client.admin.list');

    Route::get('/admin/notify/post','orderNotify')->name('admin.order.notify');

    Route::get('special_admin/{admin_id}','get_special_admin')->name('special_admin');
    Route::get('/orders','orders')->name('client.orders');


});
Route::group(['prefix'=>'client','controller'=>ClientController::class],function(){
    Route::get('/about','about')->name('client.about');
    Route::get('/contact_us','contact_us')->name('client.contactus');
});



Route::get('orders',[OrderController::class,'index']);
