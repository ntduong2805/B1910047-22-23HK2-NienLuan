<?php

use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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





Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');

    //Facility Routes
    Route::resource('facility', FacilityController::class);
    Route::get('facility/edit/{id}', [FacilityController::class, 'edit'])->name('admin.facility.edit');
    Route::put('facility/update/{id}', [FacilityController::class, 'update'])->name('admin.facility.update');
    
    //Slider Routes
    Route::resource('slider', SliderController::class);
    Route::get('slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::post('slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::put('slider/update/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::delete('slider/destroy/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');

    // User Routes
    Route::resource('user', UserController::class);
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});

