<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


/* Autenticação */

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth', [AuthController::class, 'auth'])->name('auth.user');  

/* Logout */

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');


/* Usuários */

Route::get('/usuario/cadastro', [UsersController::class, 'create'])->name('usuario.cadastro')->middleware('auth');
Route::post('/usuario/registrar', [UsersController::class, 'store'])->middleware('auth');
Route::get('/usuarios/lista', [UsersController::class, 'index'])->name('usuarios.lista')->middleware('auth');
Route::get('/usuario/visualizar/{id}', [UsersController::class, 'show'])->name('usuario.mostrar')->middleware('auth');
Route::get('/usuario/editar/{id}', [UsersController::class, 'edit'])->name('usuario.editar')->middleware('auth');
Route::post('/usuario/update/{id}', [UsersController::class, 'update'])->name('usuario.atualizar')->middleware('auth');
//Route::post('/usuario/deletar/{id}', [UsersController::class, 'destroy'])->name('usuario.deletar')->middleware('auth');


//Route::resource('/posts', UsersController::class);