<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\SocialController;
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


/*
================================
        BACKEND ROUTES
================================
*/

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');
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

    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

});


//Route::get('/admin-login' ,[AdminController::class ,'login' ])->name('adminlogin');


// Registration and login routes
Route::get('/user-login' ,[LoginController::class ,'login_view' ])->name('adminlogin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/verification/{id}',[RegisterController::class,'verification']);
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

