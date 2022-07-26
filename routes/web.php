<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataController;
use App\Http\Controllers\authController;
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


Route::get('/user', [userController::class, 'index'])->name('userData');
Route::get('/user/{id}', [userController::class, 'show'])->name('userDetail');
Route::get('/user/edit/{id}', [userController::class, 'edit'])->name('userEdit');
Route::post('/user/update/{id}', [userController::class, 'update'])->name('userUpdate');

Route::get('/auth/login', [authController::class, 'login'])->name('login');
Route::get('/auth/logout', [authController::class, 'logout'])->name('logout');
Route::get('/auth/registration', [authController::class, 'create'])->name('registration');
Route::post('/auth/login/store', [authController::class, 'loginStore'])->name('login-store');
Route::post('/auth/registration/store', [authController::class, 'store'])->name('regis-store');