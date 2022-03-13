<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware('auth:sanctum')->get('/auth', function (Request $request) {
    return $request->user();
});
*/

Route::post('/auth', [AuthController::class, 'auth']);
