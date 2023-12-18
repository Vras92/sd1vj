<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('client')->group(function () {
    Route::get('/', [ClientController::class, 'conferences'])->name('client');
    Route::get('/conferences/view/{id}', [ClientController::class, 'viewConference'])->name('viewConference');
    Route::post('/client/conferences/register/{id}', [ClientController::class, 'registerConference'])->name('registerConference');
});

Route::get('/employee', [HomeController::class, 'employee'])->name('employee');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin');
    Route::get('/user', [AdminController::class, 'adminUser'])->name('adminUser');
    Route::get('/user/modify/{id}', [UserController::class, 'modifyUser'])->name('modifyUser');
    Route::put('/user/update/{id}', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/user/management', [AdminController::class, 'adminUserManagement'])->name('adminUserManagement');
    Route::get('/conferences', [ConferenceController::class, 'adminConference'])->name('adminConference');
    Route::get('/conferences/modify/{id}', [ConferenceController::class, 'modifyConference'])->name('modifyConference');
    Route::put('/conferences/update/{id}', [ConferenceController::class, 'updateConference'])->name('updateConference');
    Route::delete('/conferences/delete/{id}', [ConferenceController::class, 'deleteConference'])->name('deleteConference');
    Route::get('/conferences/create-conference', [ConferenceController::class, 'create'])->name('createConference');
    Route::post('/conferences/create-conference', [ConferenceController::class, 'store'])->name('storeConference');

});
