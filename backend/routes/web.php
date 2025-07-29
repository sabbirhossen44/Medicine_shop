<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::post('/admin/infoupdate', [AdminController::class, 'info_update'])->name('admin.info.update');
Route::post('/admin/password/update', [AdminController::class, 'password_update'])->name('admin.password.update');
Route::post('/admin/photo/update', [AdminController::class, 'photo_update'])->name('admin.photo.update');


// user
Route::get('/user/list', [UserController::class, 'user_list'])->name('user.list');
Route::post('/user/store', [UserController::class, 'user_store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'user_edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'user_update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');


// category
Route::resource('/category', CategoryController::class);
Route::get('/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete');


// brand
Route::resource('/brand', BrandController::class);
Route::get('/brand/delete/{id}', [BrandController::class, 'brand_delete'])->name('brand.delete');


// product
Route::resource('/product', ProductController::class);


// inventory
Route::get('/inventory/{id}', [InventoryController::class, 'inventroy_list'])->name('inventory.index');




require __DIR__.'/auth.php';
