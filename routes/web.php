<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileditController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Backend\user\CardController;
use App\Http\Controllers\Backend\user\BillingController;

use App\Http\Controllers\MailController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\VendorMiddleware;
use App\Http\Middleware\UserMiddleware;
/*
================================
        FRONTEND ROUTES
================================
*/


Route::get('/' ,[WebsiteController::class ,'index' ])->name('frontendhome');
Route::get('/requested-services' ,[WebsiteController::class ,'requested_services' ])->name('requested-services');
Route::get('/services-requested' ,[WebsiteController::class ,'Get_all_services_by_ID' ])->name('services_vendorID');

/*
================================
        BACKEND ROUTES
================================
*/
Route::post('/update-user-profile', [ProfileditController::class, 'update_profile'])->name('update_user_profile');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');
    Route::get('/admin-profile-setting', [AdminController::class, 'Profile_edit'])->name('adminProfileedit');

    Route::get('/vendors/list', [AdminController::class, 'vendors_list'])->name('admin_vendors_list');
    Route::get('/admin/chat/private-chat', [AdminController::class, 'private_chat'])->name('admin_private_chat');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

});


Route::middleware([VendorMiddleware::class])->group(function () {
    Route::get('/vendor-dashboard', [VendorController::class, 'dashboard'])->name('vendordashboard');
    Route::get('/vendor/chat/private-chat', [VendorController::class, 'private_chat'])->name('vendor_private_chat');
    Route::get('/vendor-profile-setting', [VendorController::class, 'Profile_edit'])->name('vendorProfileedit');

    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});


Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/user-dashboard', [UserController::class, 'dashboard'])->name('userdashboard');
    Route::get('/user-profile-setting', [UserController::class, 'Profile_edit'])->name('userProfileedit');

    Route::get('/card-add', [CardController::class, 'create'])->name('cards.add');
    Route::Post('/card-add-details', [CardController::class, 'store'])->name('cards.store');
    Route::get('/cards', [CardController::class, 'index'])->name('cards');
    Route::get('/edit-cards/{card}/edit', [CardController::class, 'edit'])->name('cards.edit');
    Route::post('/update-cards/{card}/', [CardController::class, 'update'])->name('cards.update');
    Route::delete('/delete-cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');


});

//Route::get('/admin-login' ,[AdminController::class ,'login' ])->name('adminlogin');


// Registration and login routes
Route::get('/user-login' ,[LoginController::class ,'login_view' ])->name('adminlogin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/verification',[RegisterController::class,'verification'])->name('verification');
Route::post('/verified',[RegisterController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp',[RegisterController::class,'resendOtp'])->name('resendOtp');







Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);
Route::get('auth/googlelogin', [SocialController::class, 'redirectToGoogleLogin'])->name('auth.google_login');
Route::get('auth/googlelogin/callback', [SocialController::class, 'handleGoogleLoginCallback']);


Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);


Auth::routes();






/*
================================
        MAIL ROUTES
================================
*/

Route::get('send-mail', [MailController::class, 'index']);

