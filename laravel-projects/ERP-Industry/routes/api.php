<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
/** Auth Controller */
Route::controller(App\Http\Controllers\Api\AuthController::class)
->group(function(){

    Route::post('register', 'UserRegister');
    Route::post('login', 'UserLogin');
    Route::get('logout', function() {
        Auth::logout();
    });

});


/** OTP Controller */
Route::controller(App\Http\Controllers\Api\OtpTokenController::class)
->prefix('token')
->group(function(){

    Route::post('save', 'store');
    Route::post('check', 'showTokenForChecking');
    Route::post('delete', 'destroy');

});



/** Protected route */
Route::middleware('auth:sanctum')->group(function () {
    
    /** Route for Profile */
    Route::get('profile/{key}', [App\Http\Controllers\Api\ProfileController::class, 'show']);
    Route::get('profile', [App\Http\Controllers\Api\ProfileController::class, 'update']);


    /** ============    Route  for products     =============== */
    Route::controller(App\Http\Controllers\Api\ProductController::class)
    ->prefix('product')
    ->group(function(){

        Route::get('{section}/all', 'showAll');
        Route::get('{key}', 'findOne');
        Route::get('images/{key}', 'showProductImages');

    });



    /** ============    Route  for Cart     =============== */
    Route::controller(App\Http\Controllers\Api\CartController::class)
    ->prefix('cart')
    ->group(function(){

        Route::post('create', 'store');
        Route::get('all/{userId}', 'getAll');
        Route::get('delete/{userId}/{productId}', 'destroyOne');
        Route::get('delete/all/{userId}', 'destroyAll');

    });



    /** ============    Route  for Search     =============== */
    Route::controller(App\Http\Controllers\Api\SearchController::class)
    ->prefix('search')
    ->group(function(){

        Route::get('{section}/{item}', 'searchItem');

    });
    

    /** Route  for nanny services */
    // Route::get('nanny-profile/all', [App\Http\Controllers\Api\NannyServiceController::class, 'showAll']);
    // Route::get('nanny-profile/{key}', [App\Http\Controllers\Api\NannyServiceController::class, 'findOne']);
    // Route::post('nanny-profile/create', [App\Http\Controllers\Api\NannyServiceController::class, 'create']);
    // Route::post('nanny-profile/update', [App\Http\Controllers\Api\NannyServiceController::class, 'update']);


    /** Route for cleaning Service */
    Route::controller(App\Http\Controllers\Api\CleaningServiceController::class)
    ->prefix('cleaning-service')
    ->group(function(){

        Route::post('create', 'create');

    });

    /** Route for Sliders */
    Route::controller(App\Http\Controllers\Api\SliderController::class)
    ->prefix('sliders')
    ->group(function(){

        Route::get('{category}', 'getSliders');

    });


});

