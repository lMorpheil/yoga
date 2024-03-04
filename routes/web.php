<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;

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
// Админка

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('schedule', App\Http\Controllers\Admin\ScheduleController::class);
    Route::resource('actions', \App\Http\Controllers\Admin\ActionsController::class);
    Route::resource('employees', \App\Http\Controllers\Admin\EmployeesController::class);
//    Route::get('register', [UserController::class,'create'])->name('register.create');
//    Route::post('register', [UserController::class,'store'])->name('register.store');
});

Route::get('login', [UserController::class, 'loginForm' ])->name('login.create');
Route::post('login', [UserController::class, 'login' ])->name('login');
Route::get('logout', [UserController::class, 'logout' ])->name('logout')->middleware('auth');

Route::post('send', [SendController::class, 'send'])->name('send');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('news', [NewsController::class, 'index'])->name('news');
Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule');
Route::get('energy', [EnergyController::class, 'index'])->name('energy');
