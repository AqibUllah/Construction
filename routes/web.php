<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\paymentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);

Route::get('/v', function () {
    return view('vendor.VendorServices');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Auth::routes();

Route::resource('service',ServiceController::class);
//Route::resource('vendors',VendorController::class);

Route::group(['middleware' => ['auth','role:vendor','paymentStatus']], function () {
    Route::prefix('vendor')->group(function() {
        Route::controller(VendorController::class)->group(function() {
            Route::get('/dashboard','index')->name('vendorDashboard');
            Route::get('/services','services')->name('vendorServices');
        });
        Route::controller(\App\Http\Controllers\SettingsController::class)->group(function() {
            Route::get('/settings','Edit')->name('vendorProfile');
            Route::put('/settings','update')->name('vendorProfile');
        });
    });
});

Route::group(['middleware' => ['role:client']], function() {
    Route::prefix('client')->group(function() {
        //Route::resource('client',clientController::class);
        Route::controller(clientController::class)->group(function() {
            Route::get('/dashboard','index')->name('clientDashboard');
            Route::get('/getService/{service?}','getService');
        });
        Route::controller(\App\Http\Controllers\SettingsController::class)->group(function() {
            Route::get('/settings','Edit')->name('clientProfile');
            Route::put('/settings','update')->name('clientProfile');
        });
    });
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::prefix('admin')->group(function() {
        Route::resource('categories',CategoryController::class);
        Route::resource('stripe',\App\Http\Controllers\StripeController::class);
        Route::resource('vendors',\App\Http\Controllers\VendorController::class);
        Route::resource('clients',\App\Http\Controllers\ClientController::class);
        Route::controller(AdminController::class)->group(function() {
            Route::get('/dashboard','index')->name('adminDashboard');
        });
        Route::controller(\App\Http\Controllers\SettingsController::class)->group(function() {
            Route::get('/settings','Edit')->name('profileEdit');
            Route::put('/settings','update')->name('profileUpdate');
        });
    });
});

Route::post('checkout',[\App\Http\Controllers\StripeController::class,'createSessionForSubscription'])->name('checkout');
Route::prefix('payment')->group(function() {
    Route::controller(paymentController::class)->group(function() {
        Route::get('success','success');
        Route::get('cancel','cancel');
    });
});


