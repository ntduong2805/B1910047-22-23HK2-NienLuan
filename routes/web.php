<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FindRoomController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\ClientController;
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
Route::get('/', [ClientController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('auth.login');
});
//Admin
Route::group(['middleware' => ['isAdmin','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    //DashBoard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Permission
    Route::resource('/permissions', PermissionController::class);
    Route::delete('/permissions_mass_destroy', [PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');

    //Role
    Route::resource('/roles', RoleController::class);
    Route::delete('/roles_mass_destroy', [RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    
    //User - Country
    Route::resource('/users', UserController::class);
    Route::delete('/users_mass_destroy', [UserController::class, 'massDestroy'])->name('users.mass_destroy');
    Route::resource('/countries', CountryController::class);
    Route::delete('/countries_mass_destroy', [UserController::class, 'massDestroy'])->name('countries.mass_destroy');
    
    //Category
    Route::resource('/categories', CategoryController::class);
    Route::delete('/categories_mass_destroy', [CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
   
    //Room
    Route::resource('/rooms', RoomController::class);
    Route::delete('/rooms_mass_destroy', [RoomController::class, 'massDestroy'])->name('rooms.mass_destroy');
    
    //Customer
    Route::resource('/customers', CustomerController::class);
    Route::delete('/customers_mass_destroy', [CustomerController::class, 'massDestroy'])->name('customers.mass_destroy');
    
    //Booking
    Route::resource('/bookings', BookingController::class);
    Route::delete('/bookings_mass_destroy', [BookingController::class, 'massDestroy'])->name('bookings.mass_destroy');
    
    //FindRoom
    Route::get('/find_rooms', [FindRoomController::class, 'index'])->name('find_rooms.index');
    Route::post('/find_rooms', [FindRoomController::class, 'index']);
    
    //Calender
    Route::get('/system_calendars', [SystemCalendarController::class, 'index'])->name('system_calendars.index');
});

Auth::routes();

