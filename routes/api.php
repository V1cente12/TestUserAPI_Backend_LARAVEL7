<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\AuthController;
/*
|---------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------
|
| this is where you can register the api routes for your application. 
| these routes are loaded by the RouteServiceProvider within a group that 
| has the "api" middleware assigned. happy building your api!
|
*/

//protected routes with authentication (middleware 'auth:api')
Route::middleware('auth:api')->group(function () {
    //route to get the list of users (GET)
    Route::get('/users', [UserApiController::class, 'index']);

    //route to get a user by id (GET)
    Route::get('/users/{id}', [UserApiController::class, 'getUserById']);

    //route to create a user (POST)
    Route::post('/users', [UserApiController::class, 'store']);

    //route to update a user (PUT)
    Route::put('/users/{id}', [UserApiController::class, 'update']);

    //route to delete a user (DELETE)
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);
});

//login route
Route::post('login', [AuthController::class, 'login']);
