<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/client', [ClientController::class, 'client'])->name('client');
Route::get('/employee', [ClientController::class, 'client'])->name('employee');
Route::get('/admin', [ClientController::class, 'client'])->name('admin');
Route::get('/adminUser', [ClientController::class, 'client'])->name('adminUser');
