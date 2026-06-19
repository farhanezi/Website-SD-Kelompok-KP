<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', function () {
<<<<<<< HEAD
=======
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }

>>>>>>> b9c65e3216be6bf237075bb8b550291e668d0ec8
    return view('home');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', function () {
        return view('admin.auth_admin');
    })->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});
//ubah kode
//saya melakukan perubahan kode disini