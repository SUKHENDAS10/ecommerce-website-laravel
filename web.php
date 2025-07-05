<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('admin/dashboard',[HomeController::class,'index']);
Route::get('view_category',[AdminController::class,'category']);
Route::post('addcategory',[AdminController::class,'addcategory']);
Route::get('addproduct',[AdminController::class,'addproduct']);
Route::get('delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('edit_category/{id}',[AdminController::class,'edit_category']);
Route::post('update_category/{id}',[AdminController::class,'update_category']);
Route::post('uploadproduct',[AdminController::class,'uploadproduct']);
Route::get('view_product',[AdminController::class,'view_product']);
Route::get('delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('edit_product/{id}',[AdminController::class,'edit_product']);
Route::get('product_details/{id}',[HomeController::class,'product_details']);
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart',[HomeController::class,'mycart']);
Route::post('comfirm_order',[HomeController::class,'comfirm_order']);
Route::get('view_order',[AdminController::class,'view_order']);
Route::get('way/{id}',[AdminController::class,'way']);
Route::get('delevired/{id}',[AdminController::class,'delevired']);
Route::get('print/{id}',[AdminController::class,'print']);
Route::get('shop',[HomeController::class,'shop']);
Route::get('why',[HomeController::class,'why']);
Route::get('testimonial',[HomeController::class,'testimonial']);
Route::get('contact',[HomeController::class,'contact']);
Route::get('delete_cart/{id}',[HomeController::class,'delete_cart']);
Route::post('contact_message',[HomeController::class,'contact_message']);
Route::get('view_message',[AdminController::class,'view_message']);
Route::get('send_mail/{id}',[AdminController::class,'send_mail']);
Route::post('mail/{id}',[AdminController::class,'mail']);


Route::controller(HomeController::class)->group(function(){

    Route::get('stripe', 'stripe');

    Route::post('stripe', 'stripePost')->name('stripe.post');

});


