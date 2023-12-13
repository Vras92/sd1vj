<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('client')->group(function () {
    Route::get('/', [HomeController::class, 'client'])->name('client');
    Route::get('/conferences', [ClientController::class, 'conferences'])->name('conferences');
});

Route::get('/employee', [HomeController::class, 'employee'])->name('employee');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin');
    Route::get('/user', [AdminController::class, 'adminUser'])->name('adminUser');
    Route::get('/user/modify/{id}', [UserController::class, 'modifyUser'])->name('modifyUser');
    Route::put('/user/update/{id}', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/user/management', [AdminController::class, 'adminUserManagement'])->name('adminUserManagement');
    Route::get('/conferences', [AdminController::class, 'adminConference'])->name('adminConference');
});
