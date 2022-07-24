<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataController;
use App\Http\Controllers\userController;

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

Route::get('/', [dataController::class, 'index'])->name('home');
Route::get('/detail/{id}', [dataController::class, 'show'])->name('detail');
Route::get('/setting', [dataController::class, 'setting'])->name('setting');
Route::post('/setting/store', [dataController::class, 'settingStore'])->name('setting-store');

Route::get('/auth/login', [userController::class, 'login'])->name('login');
Route::get('/auth/logout', [userController::class, 'logout'])->name('logout');
Route::get('/auth/registration', [userController::class, 'create'])->name('registration');
Route::post('/auth/login/store', [userController::class, 'loginStore'])->name('login-store');
Route::post('/auth/registration/store', [userController::class, 'store'])->name('regis-store');