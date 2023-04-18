<?php

use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoomBookingController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dashboard\BookingController as DashboardBookingController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\HotelController;
use App\Http\Controllers\Front\RoomsController;
use App\Http\Controllers\Dashboard\HomeController as DashboardController;
use App\Http\Controllers\Dashboard\ReviewController as DashboardReviewController;
use App\Http\Controllers\Dashboard\UserController as DashboardUserController;
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
//Admin Routes
Route::prefix('admin')->middleware('admin')->name('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    //Facility Routes
    Route::prefix('facility')->controller(FacilityController::class)
        ->name('.facility.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
    });

    //Slider Routes 
    Route::prefix('slider')->controller(SliderController::class)
        ->name('.slider.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create',  'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}',  'destroy')->name('destroy');

    });
       
    // User Routes
    Route::prefix('user')->controller(UserController::class)
        ->name('.user.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::prefix('roomtype')->middleware('auth')->controller(RoomTypeController::class)
        ->name('.roomtype.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}','destroy')->name('destroy');
            // Rutes for Room Type Images
            Route::prefix('image')->controller(ImageController::class)->name('image.')->group(function(){
                Route::get('/{id}', 'index')->name('index');
                Route::get('/{id}/create', 'create')->name('create');
                Route::post('/{id}/store', 'store')->name('store');
                Route::get('/{id1}/edit/{id2}', 'edit')->name('edit');
                Route::put('/{id1}/update/{id2}', 'update')->name('update');
                Route::delete('/{id1}/destroy/{id2}', 'destroy')->name('destroy');
            });
            Route::prefix('room')->controller(RoomController::class)->name('room.')->group(function(){
                Route::get('/{id}', 'index')->name('index');
                Route::get('/{id}/create', 'create')->name('create');
                Route::post('/{id}/store', 'store')->name('store');
                Route::get('/{id1}/edit/{id2}', 'edit')->name('edit');
                Route::put('/{id1}/update/{id2}', 'update')->name('update');
                Route::delete('/{id1}/destroy/{id2}', 'destroy')->name('destroy');
            });
    });
    Route::prefix('roombooking')->middleware('auth')->controller(RoomBookingController::class)->name('.roombooking.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
    });
    Route::prefix('review')->middleware('auth')->controller(ReviewController::class)->name('.review.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/approve/{id}', 'approve')->name('approve');
        Route::get('/reject/{id}', 'reject')->name('reject');

    });
    
});
//Front Routes
Route::get('/', [HotelController::class, 'index'])->name('hotel');
Route::get('/about', [HotelController::class, 'about'])->name('about');
Route::get('/contact', [HotelController::class, 'contact'])->name('contact');
//Front Booking Routes
Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');
Route::get('/rooms/{id}', [RoomsController::class, 'show'])->name('rooms.show');
Route::post('/book/{id}', [BookingController::class, 'book'])->name('book');

//Front Dashboard Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardUserController::class, 'profile'])->name('dashboard.profile');
    Route::put('/profile', [DashboardUserController::class, 'update'])->name('dashboard.profile');
    Route::get('/setting', [DashboardUserController::class, 'setting'])->name('dashboard.setting');
    Route::put('/setting', [DashboardUserController::class, 'update_setting'])->name('dashboard.setting');
    Route::get('room', [DashboardBookingController::class, 'index'])->name('dashboard.room');
    Route::get('room/{id}', [DashboardBookingController::class, 'cancel'])->name('dashboard.roomcancel');
    Route::get('/review/{id}', [DashboardReviewController::class, 'index'])->name('dashboard.review');
    Route::post('/review/{id}', [DashboardReviewController::class, 'store'])->name('dashboard.review');

});




