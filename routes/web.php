<?php

use App\Http\Controllers\Admin\HomeController;
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
    Route::get('/', [HomeController::class, 'index']);


    // User Routes
    Route::resource('user', UserController::class);
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});

