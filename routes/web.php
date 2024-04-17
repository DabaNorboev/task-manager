<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/registration', function (){
    if (Auth::check()) {
        return redirect(route('main'));
    }
    return view('registration');})->name('registration');
Route::post('/registration', [UserController::class, 'register'])->name('user.registration');

Route::get('/login', function (){
    if (Auth::check()) {
        return redirect(route('main'));
    }
    return view('login');})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/logout', function (){
    Auth::logout();
    return redirect(route('login'));
})->name('logout');

Route::get('/main', [MainController::class, 'getMain'])->middleware('auth')->name('main');

Route::post('/main/tasks/create', [TaskController::class, 'create'])->middleware('auth')->name('task.create');





