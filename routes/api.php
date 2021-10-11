<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\CatTypeController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


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

Route::get('/users', [CrudController::class, 'list']);

Route::get('/users/{id}', [CrudController::class, 'get']);

Route::get('/cats', [CatController::class, 'list']);

Route::get('/cat/detail/{id}', [CatController::class, 'findById']);

Route::post('/cats', [CatController::class, 'store']);

Route::put('/cats/{id}/state', [CatController::class, 'updateState']);

Route::get('/city', [CityController::class, 'list']);

Route::get('/cat_type', [CatTypeController::class, 'list']);

Route::get('/cat/filters', [CatController::class, 'filter']);

