<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Persons
Route::get('/persons', [RevisionController::class, 'index']);
Route::get('/persons/{id}', [RevisionController::class, 'show']);
Route::post('/persons', [RevisionController::class, 'store']);
Route::put('/persons/{id}', [RevisionController::class, 'update']);
Route::delete('/persons/{id}', [RevisionController::class, 'destroy']);

//cars
Route::get('/cars', [RevisionController::class, 'index']);
Route::get('/cars/{id}', [RevisionController::class, 'show']);
Route::post('/cars', [RevisionController::class, 'store']);
Route::put('/cars/{id}', [RevisionController::class, 'update']);
Route::delete('/cars/{id}', [RevisionController::class, 'destroy']);

//reviews
Route::get('/reviews', [RevisionController::class, 'index']);
Route::get('/reviews/{id}', [RevisionController::class, 'show']);
Route::post('/reviews', [RevisionController::class, 'store']);
Route::put('/reviews/{id}', [RevisionController::class, 'update']);
Route::delete('/reviews/{id}', [RevisionController::class, 'destroy']);