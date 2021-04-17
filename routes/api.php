<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/getToken', [App\Http\Controllers\API\UsersController::class, 'getToken']);
Route::middleware('auth:api')->get('/getDoctors', [App\Http\Controllers\API\DoctorsController::class, 'getDoctors']);
