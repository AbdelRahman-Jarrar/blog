<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\merchantController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerchantProduct;

use Illuminate\Http\Request;
use app\Models\Product;



    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('products.listings');

    Auth::routes();
    Route::get('/dashboard', [\App\Http\Controllers\ProductController::class, 'indexx']);

    Route::get('/listings', [\App\Http\Controllers\ProductController::class, 'indexx'])->name('listings');
    Route::get('/listing', [\App\Http\Controllers\ProductController::class, 'show']);
    Route::get('/checkout', [ProductController::class, 'cartlist'])->name('check');
    Route::get('click_delete/{cart}', [ProductController::class,'removeitem']);
    Route::get('/Address', function(){ return view('Address');})->name('Address');
    Route::POST('/add_Address', [UserController::class, 'storeAddres']);
    Route::POST('/add_to_cart', [ProductController::class, 'addToCart']);
    Route::POST('/add_profile_pic', [UserController::class, 'storeProfilePic']);
    Route::POST('/makeorder', [ProductController::class, 'makeorder']);
    Route::get('/checkhyper', function(){ return view('checkhyper');})->name('checkhyper');

    Auth::routes();
    Route::get('/profile',[UserController::class, 'showProfile'])->name('profile');


    Route::get('/listings', [\App\Http\Controllers\ProductController::class, 'indexx'])->name('home');


    Route::prefix('admin')->middleware(['isAdmin'])->group(function(){

         Route::resource('users', UserController::class);
         Route::get('/listings', [\App\Http\Controllers\ProductController::class, 'indexx'])->name('orders');
         Route::get('/order', [ProductController::class, 'accept'])->name('order');
         Route::resource('products', ProductController::class);
         Route::resource('categories', CategoryController::class);




        });
Route::prefix('merchant')->middleware(['isMerchant'])->group(function(){

Route::resource('merchant', merchantController::class);
Route::resource('MerchantProduct', MerchantProduct::class);
Route::get('/listings', [\App\Http\Controllers\ProductController::class, 'indexx'])->name('listings');



});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




























// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::get('/profile',[UserController::class, 'showProfile'])->name('profile');
//     Route::resource('products', ProductController::class);
//     Route::resource('categories', CategoryController::class);


// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
