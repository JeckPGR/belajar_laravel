<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');


Route::get('/login', [RegisteredUserController::class, 'render_login'])->name('login');
Route::post('/login', [RegisteredUserController::class, 'auth_login'])->name('auth_login');

Route::post('/logout', [RegisteredUserController::class, 'logout'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'render_register'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register_akun'])->name('register_akun');

Route::get('/dashboard', [ContentController::class, 'dashboard'])->name('dashboard');
Route::get('/addbook', [ContentController::class, 'addbook'])->name('addbook');
Route::post('/dashboard', [ContentController::class, 'store_book'])->name('store_book');
Route::delete('/delete/{id}',[ContentController::class, 'delete_book'])->name('delete_book');
Route::put('/edit/{id}', [ContentController::class, 'edit_book'])->name('edit_book');


