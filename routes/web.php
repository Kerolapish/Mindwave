<?php

use App\Http\Controllers\actionController;
use App\Http\Controllers\authController;
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

Route::get('/', function () {
    return view('HomePage');
});

//Route to direct user to application login page
Route::get('/login' , [actionController::class, 'loginPage']) -> name('loginPage');

//Route to direct user to application register page
Route::get('/register' , [actionController::class, 'registerPage']) -> name('registerPage');

//Authentication route - Registration
Route::post('registration', [authController::class, 'registration'])->name('register.auth'); 

//Authentication route - Login
Route::post('login', [authController::class, 'login'])->name('login.auth'); 

//Route to direct user to admin dashboard
Route::get('admin/dashboard' , [actionController::class , 'dashboard']) -> name('dashboard');