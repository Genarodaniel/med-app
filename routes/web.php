<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::group(['middleware' => ['auth']], function(){
    Route::resource('patients', App\Http\Controllers\PatientsController::class);
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::resource('doctors', App\Http\Controllers\DoctorsController::class);
    Route::resource('schedules', App\Http\Controllers\SchedulesController::class);
});

