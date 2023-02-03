<?php
use Illuminate\Support\Facades\Route;
 
Route::prefix('user')->group(function(){ 
    Route::middleware(['isLoginUser'])->group(function () {
        // start login .
        Route::get('/registration',[App\Http\Controllers\Users\UserLoginController::class, 'UserReg']);
        Route::post('/singup',[App\Http\Controllers\Users\UserLoginController::class, 'UserRegStore']);
        
        Route::get('/login',[App\Http\Controllers\Users\UserLoginController::class, 'index']);
        Route::post('/auth',[App\Http\Controllers\Users\UserLoginController::class, 'authenticate']);
        Route::get('/logout', [App\Http\Controllers\Users\UserLoginController::class,'logout']);
        // end login.
    });    
    Route::middleware(['userlogin'])->group(function () {
        // user panel start.
        Route::get('/dashboard',[App\Http\Controllers\Users\dashboardController::class, 'index']);
        Route::post('/updatetoitem',[App\Http\Controllers\Users\dashboardController::class, 'updatetoitem']);
        Route::post('/store',[App\Http\Controllers\Users\dashboardController::class, 'TempOrderStore']);
        Route::post('/UpdateTemOrder',[App\Http\Controllers\Users\dashboardController::class, 'UpdateTemOrder']);
        Route::get('/order-page',[App\Http\Controllers\Users\dashboardController::class, 'OrderView']);
        Route::post('/ComOrderStore',[App\Http\Controllers\Users\dashboardController::class, 'ComOrderStore']);
        Route::get('/successfull-page',[App\Http\Controllers\Users\dashboardController::class, 'SucessOrderPage']);
        Route::get('/orderdelete/{temp_id}',[App\Http\Controllers\Users\dashboardController::class, 'orderdelete']);
        
        
        // user panel end.

    });
});
