<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituitionsController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\SectorsController;
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
Route::get('/usuarios/listar-todos', [UsersController::class, 'listAllUsers'])->name('usuarios.listAllUsers')->middleware('auth');
Route::get('/usuario/visualizar/{id}', [UsersController::class, 'show'])->name('usuario.mostrar')->middleware('auth');
Route::get('/usuario/editar/{id}', [UsersController::class, 'edit'])->name('usuario.editar')->middleware('auth');
Route::post('/usuario/update/{id}', [UsersController::class, 'update'])->name('usuario.atualizar')->middleware('auth');
Route::post('/usuario/deletar/{id}', [UsersController::class, 'destroy'])->name('usuario.deletar')->middleware('auth');

/* Instituições */

Route::get('/instituicao/cadastro', [InstituitionsController::class, 'create'])->name('instituicao.cadastro')->middleware('auth');
Route::post('/instituicao/registrar', [InstituitionsController::class, 'store'])->middleware('auth');
Route::get('/instituicoes/lista', [InstituitionsController::class, 'index'])->name('instituicoes.lista')->middleware('auth');
Route::get('/instituicoes/listar-todos', [InstituitionsController::class, 'listAllInstituitions'])->name('instituicoes.listAllInstituitions')->middleware('auth');
Route::get('/instituicao/visualizar/{id}', [InstituitionsController::class, 'show'])->name('instituicao.mostrar')->middleware('auth');
Route::get('/instituicao/editar/{id}', [InstituitionsController::class, 'edit'])->name('instituicao.editar')->middleware('auth');
Route::post('/instituicao/atualizar/{id}', [InstituitionsController::class, 'update'])->name('instituicao.atualizar')->middleware('auth');
Route::post('/instituicao/deletar/{id}', [InstituitionsController::class, 'destroy'])->name('instituicao.deletar')->middleware('auth');

/* Departamentos */

//Route::get('/departamento/cadastro', [DepartmentsController::class, 'create'])->name('departamento.cadastro')->middleware('auth');
Route::post('/departamento/registrar', [DepartmentsController::class, 'store'])->middleware('auth');
Route::get('/departamentos/lista', [DepartmentsController::class, 'index'])->name('departamento.lista')->middleware('auth');
Route::get('/departamentos/listar-todos', [DepartmentsController::class, 'listAllDepartments'])->name('departamentos.listAllDepartments')->middleware('auth');
Route::get('/departamento/visualizar/{id}', [DepartmentsController::class, 'show'])->name('departamento.mostrar')->middleware('auth');
Route::get('/departamento/editar/{id}', [DepartmentsController::class, 'edit'])->name('departamento.editar')->middleware('auth');
Route::post('/departamento/atualizar/{id}', [DepartmentsController::class, 'update'])->name('departamento.atualizar')->middleware('auth');
Route::post('/departamento/deletar/{id}', [DepartmentsController::class, 'destroy'])->name('departamento.deletar')->middleware('auth');

/* Setores */

Route::post('/setor/registrar', [SectorsController::class, 'store'])->middleware('auth');
Route::get('/setores/lista', [SectorsController::class, 'index'])->name('setor.lista')->middleware('auth');
Route::get('/setores/listar-todos', [SectorsController::class, 'listAllSectors'])->name('setores.listAllSectors')->middleware('auth');
Route::get('/setor/visualizar/{id}', [SectorsController::class, 'view'])->name('setor.mostrar')->middleware('auth');
Route::get('/setor/editar/{id}', [SectorsController::class, 'edit'])->name('setor.editar')->middleware('auth');
Route::post('/setor/atualizar/{id}', [SectorsController::class, 'update'])->name('setor.atualizar')->middleware('auth');
Route::post('/setor/deletar/{id}', [SectorsController::class, 'destroy'])->name('setor.deletar')->middleware('auth');

Route::get('/setor/{fk}', [SectorsController::class, 'show'])->name('setor.selecionado')->middleware('auth');

/* Cargos */

Route::post('/cargo/registrar', [PositionsController::class, 'store'])->middleware('auth');
Route::get('/cargos/lista', [PositionsController::class, 'index'])->name('cargos.lista')->middleware('auth');
Route::get('/cargos/listar-todos', [PositionsController::class, 'listAllPositions'])->name('cargos.listAllSectors')->middleware('auth');
Route::get('/cargo/visualizar/{id}', [PositionsController::class, 'show'])->name('cargo.mostrar')->middleware('auth');
Route::get('/cargo/editar/{id}', [PositionsController::class, 'edit'])->name('cargo.editar')->middleware('auth');
Route::post('/cargo/atualizar/{id}', [PositionsController::class, 'update'])->name('cargo.atualizar')->middleware('auth');
Route::post('/cargo/deletar/{id}', [PositionsController::class, 'destroy'])->name('cargo.deletar')->middleware('auth');

/* Categorias */

//Route::get('/categoria/cadastro', [CategoriesController::class, 'create'])->name('categoria.cadastro')->middleware('auth');
Route::post('/categoria/registrar', [CategoriesController::class, 'store'])->middleware('auth');
Route::get('/categorias/lista', [CategoriesController::class, 'index'])->name('categorias.lista')->middleware('auth');
Route::get('/categorias/listar-todos', [CategoriesController::class, 'listAllCategories'])->name('categorias.listAllCategories')->middleware('auth');
Route::get('/categoria/visualizar/{id}', [CategoriesController::class, 'show'])->name('categoria.mostrar')->middleware('auth');
Route::get('/categoria/editar/{id}', [CategoriesController::class, 'edit'])->name('categoria.editar')->middleware('auth');
Route::post('/categoria/atualizar/{id}', [CategoriesController::class, 'update'])->name('categoria.atualizar')->middleware('auth');
Route::post('/categoria/deletar/{id}', [CategoriesController::class, 'destroy'])->name('categoria.deletar')->middleware('auth');

/* Patrimônios */

Route::get('/modelos/listar-todos', [ModelsController::class, 'listAllModels'])->name('modelos.listAllModels')->middleware('auth');

Route::get('/patrimonio/cadastro', [AssetsController::class, 'create'])->name('patrimonio.cadastro')->middleware('auth');
Route::post('/patrimonio/registrar', [AssetsController::class, 'store'])->middleware('auth');
Route::get('/patrimonios/lista', [AssetsController::class, 'index'])->name('patrimonios.lista')->middleware('auth');
Route::get('/patrimonios/listar-todos', [AssetsController::class, 'listAllAssets'])->name('patrimonios.listAllAssets')->middleware('auth');
Route::get('/patrimonio/visualizar/{id}', [AssetsController::class, 'show'])->name('patrimonio.mostrar')->middleware('auth');
Route::get('/patrimonio/editar/{id}', [AssetsController::class, 'edit'])->name('patrimonio.editar')->middleware('auth');
Route::post('/patrimonio/atualizar/{id}', [AssetsController::class, 'update'])->name('patrimonio.atualizar')->middleware('auth');
Route::post('/patrimonio/deletar/{id}', [AssetsController::class, 'destroy'])->name('patrimonio.deletar')->middleware('auth');

/* Locações */

Route::get('/assets/{fk}', [AssetsController::class, 'selectAssets'])->name('patrimonio.selecionado')->middleware('auth');

Route::get('/emprestimo/cadastro', [LoansController::class, 'create'])->name('emprestimo.cadastro')->middleware('auth');
Route::post('/emprestimo/registrar', [LoansController::class, 'store'])->middleware('auth');
Route::get('/emprestimos/listar-todos', [LoansController::class, 'listAllAssets'])->name('emprestimos.listAllAssets')->middleware('auth');
Route::get('/emprestimo/visualizar/{id}', [LoansController::class, 'show'])->name('emprestimo.mostrar')->middleware('auth');
Route::get('/emprestimo/editar/{id}', [LoansController::class, 'edit'])->name('emprestimo.editar')->middleware('auth');
Route::post('/emprestimo/atualizar/{id}', [LoansController::class, 'update'])->name('emprestimo.atualizar')->middleware('auth');
Route::post('/emprestimo/deletar/{id}', [LoansController::class, 'destroy'])->name('emprestimo.deletar')->middleware('auth');