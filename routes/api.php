<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;

//POST methods
Route::post('/register', [UserController::class, 'signUp']);
Route::post('/login', [UserController::class, 'logIn']);

//GET methods
Route::get('/all_user', [UserController::class, 'getAllUsers']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
