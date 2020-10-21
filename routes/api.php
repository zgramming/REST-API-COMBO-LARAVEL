<?php

use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//* CRUD
Route::get('user/all', [UserController::class, 'getAll']);

Route::get('user/single/{id}', [UserController::class, 'getSingle']);

Route::get('user/where1/{id}', [UserController::class, 'getWhere1']);

Route::post('user/insertWithoutFile', [UserController::class, 'insertWithoutFile']);

Route::post('user/insertWithFile', [UserController::class, 'insertWithFile']);


Route::put('user/updateWithoutFile/{id}', [UserController::class, 'updateWithoutFile']);

Route::put('user/updateWithFile/{id}', [UserController::class, 'updateWithFile']);


Route::delete('user/deleteWithoutFile/{id}', [UserController::class, 'deleteWithoutFile']);

Route::delete('user/deleteWithFile/{id}', [UserController::class, 'deleteWithFile']);

//* Login

Route::post('user/login', [UserController::class, 'login']);

//* Register

Route::post('user/register', [UserController::class, 'register']);
