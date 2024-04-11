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

Route::get('/registration', [UserController::class, 'getRegistration']);
Route::get('/login', [UserController::class, 'getLogin']);

Route::post('/registration', [UserController::class, 'postRegistration']);
Route::post('/login', [UserController::class, 'postLogin']);
Route::post('/logout', [UserController::class, 'logout']);

