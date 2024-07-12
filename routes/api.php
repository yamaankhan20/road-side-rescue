<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\ServiceController;



Route::prefix('auth')->group(function () {
    Route::post("/login" , [LoginController::class,'login']);
    Route::post("/register" , [RegisterController::class,'register']);
});


Route::prefix('otp')->group(function () {
    Route::post("/otp-verify" , [RegisterController::class,'verify_otp']);
    Route::post("/verified-Otp" , [RegisterController::class,'verifiedOtp']);
    Route::post("/resend-top" , [RegisterController::class,'resendOtp']);
});


Route::prefix('categories')->group(function () {
    Route::post("/all-categories" , [CategoriesController::class,'index']);
    Route::post("/create-category" , [CategoriesController::class,'create']);
    Route::delete("/delete-category/{category}" , [CategoriesController::class,'delete']);
    Route::put("/update-category/{category}" , [CategoriesController::class,'update']);
});


Route::prefix('/vender/services')->group(function () {
    Route::post("/all-services" , [ServiceController::class,'index']);
    Route::post("/create-services" , [ServiceController::class,'create']);
    Route::delete("/delete-services/{service}" , [ServiceController::class,'delete']);
    Route::put("/update-services/{service}" , [ServiceController::class,'update']);
});
