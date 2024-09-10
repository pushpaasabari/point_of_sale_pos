<?php
namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

Route::prefix('suadmin')->group(function () {

    #Superadmin route 
    Route::get('/', [SuadminController::class, 'index']);
    Route::get('/index', [SuadminController::class, 'index']);
    Route::get('/login', [SuadminController::class, 'login']);
    Route::post('/login', [SuadminController::class, 'login_post']);
    Route::get('/signup', [SuadminController::class, 'signup']);
    Route::post('/signup', [SuadminController::class, 'signup_post']);
    Route::get('/signupverify', [SuadminController::class, 'signup_verify']);
    Route::post('/signupverify', [SuadminController::class, 'signup_verify_post']);
    Route::get('/logout', [SuadminController::class, 'logout']);

    #User route 
    Route::get('/user.registration', [Usercontroller::class, 'create']);
    Route::post('/user.registration', [Usercontroller::class, 'create_post']);
    Route::get('/user.admin_list', [Usercontroller::class, 'admin_list']);
    Route::get('/user.user_list', [Usercontroller::class, 'user_list']);
    Route::get('/user_status_change/{user_id}/{user_status}', [Usercontroller::class, 'user_status_change']);
    Route::get('/user.user_edit/{user_id}', [Usercontroller::class, 'user_edit']);
    Route::post('/user.user_edit', [Usercontroller::class, 'user_edit_post']);
    Route::post('/user.user_delete/{user_id}/{user_name}/', [Usercontroller::class, 'user_delete']);

    #Item route 
    Route::get('/item.add', [ItemController::class, 'item_add']);
    Route::post('/item.add', [ItemController::class, 'item_add_post']);
    Route::get('/item.list', [ItemController::class, 'item_list']);
    Route::get('/item_status_change/{item_sno}/{item_status}', [ItemController::class, 'item_status_change']);
    Route::get('/item.edit/{item_sno}', [ItemController::class, 'item_edit']);
    Route::post('/item.edit', [ItemController::class, 'item_edit_post']);
    Route::get('/item.delete/{item_sno}/{item_name}/', [ItemController::class, 'item_delete']);

    #Customer route 
    Route::get('/customer.add', [CustomerController::class, 'customer_add']);
    Route::post('/customer.add', [CustomerController::class, 'customer_add_post']);
    Route::post('/customer.add_modal', [CustomerController::class, 'customer_add_modal_post']);
    Route::get('/customer.list', [CustomerController::class, 'customer_list']);
    Route::get('/customer_status_change/{customer_sno}/{customer_status}', [CustomerController::class, 'customer_status_change']);
    Route::get('/customer.edit/{customer_sno}', [CustomerController::class, 'customer_edit']);
    Route::post('/customer.edit', [CustomerController::class, 'customer_edit_post']);
    Route::get('/customer.delete/{customer_sno}/{customer_name}/', [CustomerController::class, 'customer_delete']);

    #Vendor route 
    Route::get('/vendor.add', [VendorController::class, 'vendor_add']);
    Route::post('/vendor.add', [VendorController::class, 'vendor_add_post']);
    Route::get('/vendor.list', [VendorController::class, 'vendor_list']);
    Route::get('/vendor_status_change/{vendor_sno}/{vendor_status}', [VendorController::class, 'vendor_status_change']);
    Route::get('/vendor.edit/{vendor_sno}', [VendorController::class, 'vendor_edit']);
    Route::post('/vendor.edit', [VendorController::class, 'vendor_edit_post']);
    Route::get('/vendor.delete/{vendor_sno}/{vendor_name}/', [VendorController::class, 'vendor_delete']);

    #Purchase route 
    Route::get('/purchase.add', [PurchaseController::class, 'purchase_add']);
    Route::post('/purchase.add', [PurchaseController::class, 'purchase_add_post']);
    Route::get('/purchase.list', [PurchaseController::class, 'purchase_list']);
    // Route::get('/purchase.fetch_vendor_details', [PurchaseController::class, 'fetch_vendor_details']);
    Route::post('/purchase.fetch_vendor_details', [PurchaseController::class, 'fetch_vendor_details']);
    Route::post('/purchase.fetch_item_details', [PurchaseController::class, 'fetch_item_details']);

    #Sale route 
    Route::get('/sale.add', [SaleController::class, 'sale_add']);
    Route::post('/sale.add', [SaleController::class, 'sale_add_post']);
    Route::get('/sale.list', [SaleController::class, 'sale_list']);
    Route::post('/sale.fetch_customer_details', [SaleController::class, 'fetch_customer_details']);
    Route::post('/sale.fetch_item_details', [SaleController::class, 'fetch_item_details']);

    #Business route 
    Route::get('/business.basic', [BusinessController::class, 'business_basic']);
    Route::post('/business.upload-profile-picture', [BusinessController::class, 'uploadProfilePicture']);


});
