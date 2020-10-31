<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

//* PHP ARTISAN make controller programmatically
Route::get('artisan/make_controller/{controller}', function ($controller) {
    Artisan::call('make:controller Api/' . $controller . '');
});

//* PHP ARTISAN make model programmatically
Route::get('artisan/make_model/{model}', function ($model) {
    Artisan::call('make:model Api/' . $model . '');
});

//* PHP ARTISAN make model programmatically
Route::get('artisan/storage_link', function () {
    $result = Artisan::call('storage:link');
    return $result;
});


//* User
Route::get('user/all', [UserController::class, 'getAll']);
Route::get('user/single/{id}', [UserController::class, 'getSingle']);

Route::put('user/updateImage/{id}', [UserController::class, 'updateImage']);

Route::delete('user/delete/{id}', [UserController::class, "delete"]);
Route::delete('user/deleteImage/{id}', [UserController::class, "deleteImage"]);

Route::post('user/login', [UserController::class, 'login']);
Route::post('user/register', [UserController::class, 'register']);


//* Produk

Route::get('produk/all', [ProdukController::class, "getAllProduk"]);
Route::get('produk/single/{id}', [ProdukController::class, "getSingleProduk"]);

Route::post('produk/insert', [ProdukController::class, "insert"]);

Route::put('produk/update/{id}', [ProdukController::class, 'update']);
Route::put('produk/updateImage/{id}', [ProdukController::class, 'updateImage']);

Route::delete('produk/delete/{id}', [ProdukController::class, "delete"]);
Route::delete('produk/deleteImage/{id}', [ProdukController::class, "deleteImage"]);
