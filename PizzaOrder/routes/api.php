<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrustController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ToppingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);

Route::get('/crust', [CrustController::class, 'index']);
Route::get('/crust/{id}', [CrustController::class, 'show']);
Route::post('/crust', [CrustController::class, 'store']);

Route::get('/toppings', [ToppingController::class, 'index']);
Route::get('/toppings/{id}', [ToppingController::class, 'show']);
Route::post('/toppings', [ToppingController::class, 'store']);

Route::get('/pizzas', [PizzaController::class, 'index']);
Route::get('/pizzas/{id}', [PizzaController::class, 'show']);
Route::post('/pizzas', [PizzaController::class, 'store']);
