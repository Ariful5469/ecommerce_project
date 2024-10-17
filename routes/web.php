<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route for home page
Route::get('/', [HomeController::class, 'home']);


Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

// Grouping routes under 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__ . '/auth.php';

// Route for admin dashboard with 'auth' and 'admin' middleware
Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin']);






    




    

// Route for viewing categories with 'auth' and 'admin' middleware
Route::get('view_category', [AdminController::class, 'view_category'])
    ->middleware(['auth', 'admin']);

// Route for adding a category with 'auth' and 'admin' middleware
Route::post('add_category', [AdminController::class, 'add_category'])
    ->middleware(['auth', 'admin']);


Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])
    ->middleware(['auth', 'admin']);


Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])
    ->middleware(['auth', 'admin']);

Route::post('update_category/{id}', [AdminController::class, 'update_category'])
    ->middleware(['auth', 'admin']);

Route::get('add_product', [AdminController::class, 'add_product'])
    ->middleware(['auth', 'admin']);

Route::post('upload_product', [AdminController::class, 'upload_product'])
    ->middleware(['auth', 'admin']);


Route::get('view_product', [AdminController::class, 'view_product'])
    ->middleware(['auth', 'admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])
    ->middleware(['auth', 'admin']);


Route::get('search_product', [AdminController::class, 'search_product'])
    ->middleware(['auth', 'admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

Route::post('remove_cart/{id}', [HomeController::class, 'remove_cart'])->middleware(['auth', 'verified']);

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);


Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{totalPrice}', 'stripe');

    Route::post('stripe/{totalPrice}', 'stripePost')->name('stripe.post');

});




Route::get('view_orders', [AdminController::class, 'view_order'])->middleware(['auth', 'verified'])
->middleware(['auth', 'admin']);




Route::get('admin_index', [AdminController::class, 'admin_index'])->middleware(['auth', 'verified'])
->middleware(['auth', 'admin']);




Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'verified'])
->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'verified'])
->middleware(['auth', 'admin']);