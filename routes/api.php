<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('hello', [AuthController::class, 'hello']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('user',[AuthController::class,'user']);
    Route::post('logout',[AuthController::class,'logout']);

    Route::put('users/info',[AuthController::class, 'updateInfo']);
    Route::put('users/password',[AuthController::class, 'updatePassword']);

/*    Route::get('users',[UserController::class, 'index']);
    Route::post('users',[UserController::class, 'store']);
    Route::get('users/{id}',[UserController::class, 'show']);
    Route::put('users/{id}',[UserController::class, 'update']);
    Route::delete('users/{id}',[UserController::class, 'destroy']);*/

    Route::apiResource('users',UserController::class); // it's the same as above
    Route::apiResource('roles',RoleController::class);
    Route::apiResource('products', ProductsController::class);
    Route::get('permissions', [PermissionController::class, 'index']);
    Route::post('upload',[ImageController::class,'upload']);

    Route::apiResource('orders',OrderController::class)->only('index','show');

});


/*Route::post('popo', function () {
    return 'This is Simple Route Example of nicesnippets.com';
});*/
