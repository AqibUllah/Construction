<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::resource('service',ServiceController::class);
Route::resource('vendors',VendorController::class);

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function() { 
        Route::controller(AdminController::class)->group(function() {
            Route::get('/dashboard','index')->name('home');
        });
    });
});


Route::group(['middleware' => ['role:vendor']], function () {
    Route::controller(VendorController::class)->group(function() {
        Route::get('/dashboard','index')->name('vendor_home');
    });
});

