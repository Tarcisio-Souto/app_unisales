<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituitionsController;
use App\Http\Controllers\SectorsController;
use App\Http\Controllers\UsersController;
use App\Models\Instituitions;
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
Route::post('/usuario/deletar/{id}', [UsersController::class, 'destroy'])->name('usuario.deletar')->middleware('auth');


Route::get('/setor/{fk}', [SectorsController::class, 'show'])->name('setor.selecionado')->middleware('auth');

/* Instituições */

Route::get('/instituicoes/lista', [InstituitionsController::class, 'index'])->name('instituicoes.lista')->middleware('auth');
Route::get('/instituicao/visualizar/{id}', [InstituitionsController::class, 'show'])->name('instituicao.mostrar')->middleware('auth');
Route::get('/instituicao/editar/{id}', [InstituitionsController::class, 'edit'])->name('instituicao.editar')->middleware('auth');
Route::post('/instituicao/atualizar/{id}', [InstituitionsController::class, 'update'])->name('instituicao.atualizar')->middleware('auth');
Route::post('/instituicao/deletar/{id}', [InstituitionsController::class, 'destroy'])->name('instituicao.deletar')->middleware('auth');








