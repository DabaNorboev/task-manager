<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/registration', [UserController::class, 'getRegistration'])->name('user.registration');
Route::get('/login', [UserController::class, 'getLogin'])->name('user.login');

Route::post('/registration', [UserController::class, 'create'])->name('user.registration.post');
Route::post('/login', [UserController::class, 'login'])->name('user.login.post');



