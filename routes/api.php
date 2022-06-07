<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;


Route::post('/register', [UserController::class, 'signUp']);
Route::post('/login', [UserController::class, 'logIn']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
