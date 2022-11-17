<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\clientController;
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
});

Auth::routes();

Route::resource('service',ServiceController::class);
Route::resource('vendors',VendorController::class);

Route::group(['middleware' => ['role:vendor']], function () {
    Route::prefix('vendor')->group(function() {
        Route::controller(VendorController::class)->group(function() {
            Route::get('/dashboard','index')->name('vendorDashboard');
            Route::get('/services','services')->name('vendorServices');
        });
    });
});

Route::group(['middleware' => ['role:client']], function() {
    Route::resource('client',clientController::class);
    Route::controller(clientController::class)->group(function() {
       Route::get('/getService/{service?}','getService');
    });
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function() {
        Route::resource('categories',CategoryController::class);
        Route::controller(AdminController::class)->group(function() {
            Route::get('/dashboard','index')->name('adminDashboard');
        });
    });
});




