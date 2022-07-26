<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ocppController;
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

Route::group(['prefix'=>'v1'],function(){
    Route::post('heartbeat', [ocppController::class, 'heartbeat']);
    Route::post('bootnotification', [ocppController::class, 'boot_notification']);
    Route::post('statusnotification', [ocppController::class, 'status_notification']);
  });
