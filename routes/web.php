<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\products\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('products/category/{id}', [ProductsController::class, 'singleCategory'])->name('single.category');
Route::get('products/single-product/{id}', [ProductsController::class, 'singleProduct'])->name('single.product');
Route::get('products.shop',[ProductsController::class,'shop'])->name('products.shop');


//cart
Route::post('products/add-cart',[ProductsController::class,'addToCart'])->name('products.add.cart');
Route::get('products/cart',[ProductsController::class,'cart'])->name('products.cart');
Route::get('products/delete-cart/{id}', [ProductsController::class, 'deletefromCart']) ->name('products.delete-cart');
//checkouut
Route::POST('products/prepare-checkout', [ProductsController::class, 'prepareCheckout']) ->name('products.prepare-checkout');
Route::get('products/checkout', [ProductsController::class, 'checkout']) ->name('products.checkout')->middleware('check.for.price');
Route::POST('products/checkout', [ProductsController::class, 'proccessCheckout']) ->name('products.proccess.checkout')->middleware('check.for.price');
Route::get('products/pay', [ProductsController::class, 'payWithPaypal']) ->name('products.pay')->middleware('check.for.price');
Route::get('products/success', [ProductsController::class, 'success']) ->name('products.success')->middleware('check.for.price');
///users transcations
Route::get('users/my-orders', [App\Http\Controllers\Users\UsersController::class, 'myorders'])->name('users.orders')->middleware('auth:web');
Route::get('users/settings', [App\Http\Controllers\Users\UsersController::class, 'settings'])->name('users.settings')->middleware('auth:web');
Route::Post('users/settings/{id}', [App\Http\Controllers\Users\UsersController::class, 'updateUserSettings'])->name('users.settings.update')->middleware('auth:web');
//admins
Route::get('admins/login',[App\Http\Controllers\Admins\AdminsController::class,'viewlogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admins/login',[App\Http\Controllers\Admins\AdminsController::class,'checklogin'])->name('check.login')
;

Route::group(['prefix' => 'admins', 'middleware' => 'auth:admin'], function() {
    //admins dashboard
    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'displayAdmins'])->name('admins.all');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');
   //categories
    Route::get('/all-categories', [App\Http\Controllers\Admins\AdminsController::class, 'displaycategories'])->name('categories.all');
    Route::get('/create-categories', [App\Http\Controllers\Admins\AdminsController::class, 'createcategories'])->name('categories.create');
    Route::POST('/create-categories', [App\Http\Controllers\Admins\AdminsController::class, 'storecategories'])->name('categories.store');
    Route::get('/edit-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editcategories'])->name('categories.edit');
    Route::post('update-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updatecategories'])->name('categories.update');
    Route::get('/delete-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deletecategories'])->name('categories.delete');
//products
Route::get('/all-products', [App\Http\Controllers\Admins\AdminsController::class, 'displayproducts'])->name('products.all');
Route::get('/create-products', [App\Http\Controllers\Admins\AdminsController::class, 'createproducts'])->name('products.create');
Route::POST('/create-products', [App\Http\Controllers\Admins\AdminsController::class, 'storeproducts'])->name('products.store');
Route::get('/delete-products/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteproducts'])->name('products.delete');
//order
Route::get('/all-orders', [App\Http\Controllers\Admins\AdminsController::class, 'allorders'])->name('orders.all');
Route::get('/edit-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editorders'])->name('orders.edit');
Route::post('/update-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateorders'])->name('orders.update');

});

