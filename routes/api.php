<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// adminroutes
Route::apiResource('admin','Api\Admin\AdminController');
// parmanently delete admin route
Route::get('admin-parmanently-delete/{id}','Api\Admin\AdminController@parmanentlyDelete');

// user routes
Route::apiResource('users','Api\User\UserController');
// parmanently delete user route
Route::get('user-parmanently-delete/{id}','Api\User\UserController@parmanentlyDelete');

// wallet routes
Route::apiResource('account','Api\Subscriber\WalletController');
// parmanently delete account route
Route::get('account-parmanently-delete/{id}','Api\Subscriber\WalletController@parmanentlyDelete');

// variation routes
Route::apiResource('variation','Api\Product\VariationController');
// parmanently delete variation route
Route::get('variation-parmanently-delete/{id}','Api\Product\VariationController@parmanentlyDelete');

// tax routes
Route::apiResource('tax','Api\Tax\TaxController');
// parmanently delete tax route
Route::get('tax-parmanently-delete/{id}','Api\Tax\TaxController@parmanentlyDelete');

// subscription routes
Route::apiResource('subscription','Api\Subscription\SubscriptionController');
// parmanently delete subscription route
Route::get('subscription-parmanently-delete/{id}','Api\Subscription\SubscriptionController@parmanentlyDelete');

// subscriber routes
Route::apiResource('subscriber','Api\Subscriber\SubscriberController');
// parmanently delete subscriber route
Route::get('subscriber-parmanently-delete/{id}','Api\Subscriber\SubscriberController@parmanentlyDelete');

// shift routes
Route::apiResource('shift','Api\Shift\ShiftController');
// parmanently delete shift route
Route::get('shift-parmanently-delete/{id}','Api\Shift\ShiftController@parmanentlyDelete');

// setting routes
Route::apiResource('setting','Api\Setting\SettingController');
// parmanently delete setting route
Route::get('setting-parmanently-delete/{id}','Api\setting\settingController@parmanentlyDelete');

// report-product routes
Route::apiResource('report-product','Api\ReportProduct\ReportProductController');
// parmanently delete report-product route
Route::get('report-product-parmanently-delete/{id}','Api\ReportProduct\ReportProductController@parmanentlyDelete');

// report routes
Route::apiResource('report','Api\Report\ReportController');
// parmanently delete report route
Route::get('report-parmanently-delete/{id}','Api\Report\ReportController@parmanentlyDelete');

// product routes
Route::apiResource('product','Api\Product\ProductController');
// parmanently delete product route
Route::get('product-parmanently-delete/{id}','Api\Product\ProductController@parmanentlyDelete');

// payment routes
Route::apiResource('payment','Api\Payment\PaymentController');
// parmanently delete payment route
Route::get('payment-parmanently-delete/{id}','Api\Payment\PaymentController@parmanentlyDelete');

// order-product routes
Route::apiResource('order-product','Api\OrderProduct\OrderProductController');
// parmanently delete order-product route
Route::get('order-product-parmanently-delete/{id}','Api\OrderProduct\OrderProductController@parmanentlyDelete');

// order routes
Route::apiResource('order','Api\Order\OrderController');
// parmanently delete order route
Route::get('order-parmanently-delete/{id}','Api\Order\OrderController@parmanentlyDelete');

// inventory routes
Route::apiResource('inventory','Api\Inventory\InventoryController');
// parmanently delete inventory route
Route::get('inventory-parmanently-delete/{id}','Api\Inventory\InventoryController@parmanentlyDelete');

// employee routes
Route::apiResource('employee','Api\Employee\EmployeeController');
// parmanently delete employee route
Route::get('employee-parmanently-delete/{id}','Api\Employee\EmployeeController@parmanentlyDelete');

// customer routes
Route::apiResource('customer','Api\Customer\CustomerController');
// parmanently delete customer route
Route::get('customer-parmanently-delete/{id}','Api\Customer\CustomerController@parmanentlyDelete');

// category routes
Route::apiResource('category','Api\Category\CategoryController');
// parmanently delete category route
Route::get('category-parmanently-delete/{id}','Api\Category\CategoryController@parmanentlyDelete');



// fallback route
Route::fallback(function () {
    return response()->json([
            'success'=> false, 
            'message'=> 'No such route found on this server',
            'data'=>null], 404);
});