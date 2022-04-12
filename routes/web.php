<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


/* Autenticação */

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth', [AuthController::class, 'auth'])->name('auth.user');  


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');


/* Usuários */

Route::get('/usuario/registrar', [UsersController::class, 'create'])->name('/user/register')->middleware('auth');