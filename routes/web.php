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

    //Route for dashboard
    Route::get('admin/dashboard' , [actionController::class , 'dashboard']) -> name('dashboard');
    Route::get('admin/branding' , [actionController::class , 'branding']) -> name('branding');
    Route::get('admin/background' , [actionController::class , 'background']) -> name('background');
    Route::get('admin/content' , [actionController::class , 'content']) -> name('content');
    Route::get('admin/information' , [actionController::class , 'information']) -> name('information');
    Route::get('admin/service' , [actionController::class , 'service']) -> name('service');
    Route::get('admin/footer',[actionController::class , 'footer']) -> name('footer');
    Route::get('admin/team' , [actionController::class , 'team']) -> name('team');
    Route::get('admin/siteStatus' , [actionController::class , 'siteStatus']) -> name('siteStatus');
    Route::get('admin/profile' , [actionController::class] , 'updateProfile') -> name('updateProfile');

    //Route for branding page (admin/branding)
    Route::post('admin/brading/update/siteName' , [actionController::class , 'updateSiteName']) -> name('updateSiteName');
    Route::post('admin/brading/update/image', [ actionController::class, 'updateImage' ])->name('updateImage');
    Route::post('admin/brading/update/logo', [ actionController::class, 'updateLogo' ])->name('updateLogo');
    
    //Route for background page (admin/background)
    Route::post('admin/background/update/video', [actionController::class, 'updateVidBg'])->name('updateVidBg');
    Route::post('admin/brading/update/bg1', [ actionController::class, 'updateBg1' ])->name('updateBg1');
    Route::post('admin/brading/update/bg2', [ actionController::class, 'updateBg2' ])->name('updateBg2');

    //Route for content page (admin/content)
    Route::post('admin/content/update/topTitle' , [actionController::class , 'updateTopTitle']) -> name('updateTopTitle');
    Route::post('admin/content/update/paragraph' , [actionController::class , 'updateParagraph']) -> name('updateParagraph');
    
    //Route for information page (admin/information)
    Route::post('admin/information/update/phoneNum' , [actionController::class , 'updatePhoneNumber']) -> name('updatePhoneNumber');
    Route::post('admin/infomation/update/updateEmail' , [actionController::class , 'updateEmail']) -> name('updateEmail');
    Route::post('admin/information/update/address' , [actionController::class , 'updateAddress']) -> name('updateAddress'); 
    
    //Route for service page (admin/service)
    Route::post('admin/service/update/cardDetails/{id}' , [actionController::class , 'updateCardService']) -> name('updateCardService');

    //Route for footer page (admin/footer)
    Route::post('admin/footer/update/description', [actionController::class , 'updateFooter'])-> name('updateFooter');

    //Route for team page (admin/team)
    Route::post('admin/team/update/teamDetails/{id}', [actionController::class , 'updateTeam']) -> name('updateTeam');
    
    //Route for site status page (admin/siteStatus)
    Route::post('admin/siteStatus/disableSite' , [actionController::class, 'disableSite']) -> name('disableSite');
    Route::get('admin/siteStatus/enable' , [actionController::class, 'enableSite']) -> name('enableSite');
    
    //Route for profile
    Route::post('admin/profile/updateUsername/{id}' , [actionController::class , 'updateUsername']) -> name('updateUsername');
    Route::post('admin/profile/updatePassword/{id}' , [actionController::class , 'updatePassword']) -> name('updatePassword');

    //////////////////////////////////////////////
    //SETUP//
    
    //Route for create setup in branding
    Route::post('admin/branding/add' , [setupcontroller::class , 'addBrand']) -> name('addBrand');
    Route::get('admin/branding/create' , [setupController::class , 'createBranding']) -> name('createBranding');

    //Route for create setup in background
    Route::get('admin/background/create' , [setupController::class , 'createBackground']) -> name('createBackground');
    Route::post('admin/background/add', [setupController::class, 'addBg'])->name('addBg');  
    
    Route::get('admin/content/create' , [setupController::class , 'createContent']) -> name('createContent');
    Route::post('admin/content/add' , [setupController::class , 'addContent']) -> name('addContent');

    Route::get('admin/service/create' , [setupController::class , 'createService']) -> name('createService');
    Route::post('admin/service/add/{id}' , [setupController::class, 'addService']) -> name('addService');

    Route::get('admin/team/create' , [setupController::class , 'createTeam']) -> name('createTeam');
    Route::post('admin/team/add/{id}' , [setupController::class , 'addTeam']) -> name('addTeam');

    Route::get('admin/footer/create' , [setupController::class , 'createFooter']) -> name('createFooter');
    Route::post('admin/footer/add' , [setupController::class , 'addFooter']) -> name('addFooter');
    
    Route::get('admin/information/create' , [setupController::class , 'createInfo']) -> name('createInfo');
    Route::post('admin/information/add' , [setupController::class , 'addInfo']) -> name('addInfo');

    Route::get('admin/profile' , [setupController::class , 'profile']) -> name('profile');
    Route::post('admin/profile/set-profile/{id}' , [setupController::class , 'setProfile']) -> name('setProfile');
});