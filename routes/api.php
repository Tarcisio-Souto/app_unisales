<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterLoanController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware('auth:sanctum')->get('/auth', function (Request $request) {
    return $request->user();
});
*/

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/register-loan', [RegisterLoanController::class, 'registerLoan']);
Route::post('/list-loans-user', [RegisterLoanController::class, 'listLoansUser']);