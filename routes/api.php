<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;

//POST methods
Route::post('/register', [UserController::class, 'signUp']);
Route::post('/login', [UserController::class, 'logIn']);
Route::post('/add_restaurant', [RestaurantController::class, 'addRestaurant']);
Route::post('/add_review', [RestaurantController::class, 'addReview']);
Route::post('/approve_review', [RestaurantController::class, 'approveReview']);

//GET methods
Route::get('/all_user/{id?}', [UserController::class, 'getAllUsers']);
Route::get('/all_restaurants/{id?}', [RestaurantController::class, 'getAllRestaurants']);
Route::get('/onprogress', [RestaurantController::class, 'getOnProgressReview']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
