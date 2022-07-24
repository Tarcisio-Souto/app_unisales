<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituitionsController;
use App\Http\Controllers\PositionsController;
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

/* Instituições */

Route::get('/instituicao/cadastro', [InstituitionsController::class, 'create'])->name('instituicao.cadastro')->middleware('auth');
Route::post('/instituicao/registrar', [InstituitionsController::class, 'store'])->middleware('auth');
Route::get('/instituicoes/lista', [InstituitionsController::class, 'index'])->name('instituicoes.lista')->middleware('auth');
Route::get('/instituicao/visualizar/{id}', [InstituitionsController::class, 'show'])->name('instituicao.mostrar')->middleware('auth');
Route::get('/instituicao/editar/{id}', [InstituitionsController::class, 'edit'])->name('instituicao.editar')->middleware('auth');
Route::post('/instituicao/atualizar/{id}', [InstituitionsController::class, 'update'])->name('instituicao.atualizar')->middleware('auth');
Route::post('/instituicao/deletar/{id}', [InstituitionsController::class, 'destroy'])->name('instituicao.deletar')->middleware('auth');

/* Departamentos */

Route::get('/departamento/cadastro', [DepartmentsController::class, 'create'])->name('departamento.cadastro')->middleware('auth');
Route::post('/departamento/registrar', [DepartmentsController::class, 'store'])->middleware('auth');
Route::get('/departamentos/lista', [DepartmentsController::class, 'index'])->name('departamento.lista')->middleware('auth');
Route::get('/departamento/visualizar/{id}', [DepartmentsController::class, 'show'])->name('departamento.mostrar')->middleware('auth');
Route::get('/departamento/editar/{id}', [DepartmentsController::class, 'edit'])->name('departamento.editar')->middleware('auth');
Route::post('/departamento/atualizar/{id}', [DepartmentsController::class, 'update'])->name('departamento.atualizar')->middleware('auth');
Route::post('/departamento/deletar/{id}', [DepartmentsController::class, 'destroy'])->name('departamento.deletar')->middleware('auth');

/* Setores */

Route::get('/setor/cadastro', [SectorsController::class, 'create'])->name('setor.cadastro')->middleware('auth');
Route::post('/setor/registrar', [SectorsController::class, 'store'])->middleware('auth');
Route::get('/setores/lista', [SectorsController::class, 'index'])->name('setor.lista')->middleware('auth');
Route::get('/setor/visualizar/{id}', [SectorsController::class, 'view'])->name('setor.mostrar')->middleware('auth');
Route::get('/setor/editar/{id}', [SectorsController::class, 'edit'])->name('setor.editar')->middleware('auth');
Route::post('/setor/atualizar/{id}', [SectorsController::class, 'update'])->name('setor.atualizar')->middleware('auth');
Route::post('/setor/deletar/{id}', [SectorsController::class, 'destroy'])->name('setor.deletar')->middleware('auth');

Route::get('/setor/{fk}', [SectorsController::class, 'show'])->name('setor.selecionado')->middleware('auth');

/* Cargos */

Route::get('/cargo/cadastro', [PositionsController::class, 'create'])->name('cargo.cadastro')->middleware('auth');
Route::post('/cargo/registrar', [PositionsController::class, 'store'])->middleware('auth');
Route::get('/cargos/lista', [PositionsController::class, 'index'])->name('cargo.lista')->middleware('auth');
Route::get('/cargo/visualizar/{id}', [PositionsController::class, 'view'])->name('cargo.mostrar')->middleware('auth');
Route::get('/cargo/editar/{id}', [PositionsController::class, 'edit'])->name('cargo.editar')->middleware('auth');
Route::post('/cargo/atualizar/{id}', [PositionsController::class, 'update'])->name('cargo.atualizar')->middleware('auth');
Route::post('/cargo/deletar/{id}', [PositionsController::class, 'destroy'])->name('cargo.deletar')->middleware('auth');

