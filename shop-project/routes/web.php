<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', UserController::class);



// // لیست همه کاربران
// Route::get('/users', [UserController::class, 'index'])->name('users.index');

// // فرم ایجاد کاربر جدید
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// // ذخیره کاربر جدید
// Route::post('/users', [UserController::class, 'store'])->name('users.store');

// // نمایش یک کاربر خاص
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// // فرم ویرایش کاربر
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// // آپدیت اطلاعات کاربر
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// // یا:
// Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');

// // حذف کاربر
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

