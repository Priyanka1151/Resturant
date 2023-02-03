<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Click;
use App\Http\Livewire\ClickEvent;
 
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

Route::get('/react', function () {
    return view('react');
}); 

Route::post('count', function (Request $request) {
    return response()->json([
        'message' => $request->message,
    ]);
});

Route::prefix('admin')->group(function(){ 

    Route::middleware(['isadminlogin'])->group(function () {
        // start login .
        Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'index']);
        Route::post('/dashboard',[App\Http\Controllers\Admin\LoginController::class, 'Auth']);
        Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class,'logout']);
        // end login.
    });
    // start login panel.

    // end login panel.
    Route::middleware(['adminlogin'])->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

        // start shop.
        Route::get('/shop', [App\Http\Controllers\Admin\MstShopController::class, 'index']);
        Route::post('/shop/store', [App\Http\Controllers\Admin\MstShopController::class, 'store']);
        Route::get('/shop/delete/{shop_Tid}', [App\Http\Controllers\Admin\MstShopController::class, 'delete']);
        Route::get('/shop/edit/{shop_Tid}', [App\Http\Controllers\Admin\MstShopController::class, 'edit']);
        Route::post('/shop/update', [App\Http\Controllers\Admin\MstShopController::class, 'update']);

        // end shop.

        // start Menu Category.
        Route::get('/category', [App\Http\Controllers\Admin\MenuCategoryController::class, 'index']);
        Route::post('/category/store', [App\Http\Controllers\Admin\MenuCategoryController::class, 'store']);
        Route::get('/category/delete/{Category_Tid}', [App\Http\Controllers\Admin\MenuCategoryController::class, 'delete']);
        Route::get('/category/edit/{Category_Tid}', [App\Http\Controllers\Admin\MenuCategoryController::class, 'edit']);
        Route::post('/category/update', [App\Http\Controllers\Admin\MenuCategoryController::class, 'update']);
        // end Menu Category.
        
        // start Menu Item.
        Route::get('/item',[App\Http\Controllers\Admin\MenuItemController::class, 'index']);
        Route::post('/item/store',[App\Http\Controllers\Admin\MenuItemController::class, 'store']);
        Route::get('/item/delete/{MenuItem_Tid}', [App\Http\Controllers\Admin\MenuItemController::class, 'delete']);
        Route::get('/item/edit/{MenuItem_Tid}', [App\Http\Controllers\Admin\MenuItemController::class, 'edit']);
        Route::post('/item/update', [App\Http\Controllers\Admin\MenuItemController::class, 'update']);
        // end Menu item.

        // start Resturant.
        Route::get('/resturant', [App\Http\Controllers\Admin\ResturantController::class, 'index']);
        Route::post('/resturant/store', [App\Http\Controllers\Admin\ResturantController::class, 'store']);
        Route::get('/resturant/destroy/{Restutant_Tid}', [App\Http\Controllers\Admin\ResturantController::class, 'destroy']);
        Route::get('/resturant/edit/{Restutant_Tid}', [App\Http\Controllers\Admin\ResturantController::class, 'edit']);
        Route::post('/resturant/update', [App\Http\Controllers\Admin\ResturantController::class, 'update']);
        Route::post('/resturant/updatestatus', [App\Http\Controllers\Admin\ResturantController::class, 'UpdateStatus']);
        
        Route::post('/update', [App\Http\Controllers\Admin\ResturantController::class, 'statusupdates']);


        
        // end resturant. 

        // start order.
        Route::get('/orderpage', [App\Http\Controllers\Admin\ResturantController::class, 'OrderPage']);
        // end order.

        // start livewire.
        Route::get('/click', Click::class);
        Route::get('click-event', ClickEvent::class);
        // end livewire.
    }); 
});       