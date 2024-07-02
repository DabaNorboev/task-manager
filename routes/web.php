<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
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

Route::get('/tasks/{id}', [TaskController::class, 'getTask'])->middleware('auth')->name('task');
Route::post('/task/create', [TaskController::class, 'create'])->middleware('auth')->name('task.create');
Route::get('/task/update/{id}', [TaskController::class, 'getUpdateForm'])->middleware('auth')->name('task.update.form');
Route::put('/task/update/{id}', [TaskController::class, 'update'])->middleware('auth')->name('task.update');

Route::post('/comment/create', [CommentController::class, 'create'])->name('comment.create');

Route::post('/attachment/create', [AttachmentController::class, 'create'])->name('attachment.create');
Route::delete('/attachment/delete/{id}', [AttachmentController::class, 'delete'])->name('attachment.delete');
Route::get('/attachment/download/{id}', [AttachmentController::class, 'download'])->name('attachment.download');

Route::post('/task/createTask', [TaskController::class, 'createTask'])->name('task.createTask');
