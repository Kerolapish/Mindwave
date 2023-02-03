<?php

use App\Http\Controllers\actionController;
use App\Http\Controllers\authController;
use App\Http\Controllers\setupController;
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

Route::get('/', [actionController::class, 'index']) -> name('index');

//Route to direct user to application login page
Route::get('/login' , [actionController::class, 'loginPage']) -> name('loginPage');

//Route to direct user to application register page
Route::get('/register' , [actionController::class, 'registerPage']) -> name('registerPage');

//Authentication route - Registration
Route::post('registration', [authController::class, 'registration'])->name('register.auth'); 

//Authentication route - Login
Route::post('login', [authController::class, 'login'])->name('login.auth'); 

//Authentication route - Logout
Route::post('logout', [authController::class, 'logout'])-> name('logout');

//Unauthorize 401 Page
Route::get('/unauthorize' , [actionController::class, 'unathorizeError']) -> name('unauthorize');

//protect route - only authorize user able to access 
Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard' , [actionController::class , 'dashboard']) -> name('dashboard');
    Route::get('admin/branding' , [actionController::class , 'branding']) -> name('branding');
    Route::post('admin/brading/update/siteName' , [actionController::class , 'updateSiteName']) -> name('updateSiteName');
    Route::post('admin/brading/update/image', [ actionController::class, 'updateImage' ])->name('updateImage');
    Route::post('admin/brading/update/logo', [ actionController::class, 'updateLogo' ])->name('updateLogo');
    Route::get('admin/content' , [actionController::class , 'content']) -> name('content');
    Route::post('admin/content/update/topTitle' , [actionController::class , 'updateTopTitle']) -> name('updateTopTitle');
    Route::post('admin/content/update/paragraph' , [actionController::class , 'updateParagraph']) -> name('updateParagraph');
    Route::get('admin/information' , [actionController::class , 'information']) -> name('information');
    Route::post('admin/information/update/phoneNum' , [actionController::class , 'updatePhoneNumber']) -> name('updatePhoneNumber');
    Route::post('admin/information/update/address' , [actionController::class , 'updateAddress']) -> name('updateAddress');
    Route::post('admin/infomation/update/updateEmail' , [actionController::class , 'updateEmail']) -> name('updateEmail');
    Route::post('admin/information/update/website' , [actionController::class , 'updateWebsite']) -> name('updateWebsite');
    Route::get('admin/service' , [actionController::class , 'service']) -> name('service');
    Route::post('admin/service/update/cardDetails/{id}' , [actionController::class , 'updateCardService']) -> name('updateCardService');
    Route::get('admin/team' , [actionController::class , 'team']) -> name('team');
    Route::post('admin/team/update/teamDetails/{id}', [actionController::class , 'updateTeam']) -> name('updateTeam');
    Route::get('admin/background' , [actionController::class , 'background']) -> name('background');
    Route::post('admin/background/update/video', [actionController::class, 'updateVidBg'])->name('updateVidBg');
    Route::post('admin/brading/update/bg1', [ actionController::class, 'updateBg1' ])->name('updateBg1');
    Route::post('admin/brading/update/bg2', [ actionController::class, 'updateBg2' ])->name('updateBg2');
    Route::get('admin/footer',[actionController::class , 'footer']) -> name('footer');
    Route::post('admin/footer/update/description', [actionController::class , 'updateFooter'])-> name('updateFooter');
    Route::get('admin/siteStatus' , [actionController::class , 'siteStatus']) -> name('siteStatus');
    Route::post('admin/siteStatus/disableSite' , [actionController::class, 'disableSite']) -> name('disableSite');
    Route::get('admin/siteStatus/enable' , [actionController::class, 'enableSite']) -> name('enableSite');
    //Create for setup
    Route::get('admin/branding/create' , [setupController::class , 'createBranding']) -> name('createBranding');
    Route::get('admin/service/create' , [setupController::class , 'createService']) -> name('createService');
    Route::post('admin/service/add/{id}' , [setupController::class, 'addService']) -> name('addService');
});