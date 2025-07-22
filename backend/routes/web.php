<?php

use App\Http\Controllers\AdminController;
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




require __DIR__.'/auth.php';
