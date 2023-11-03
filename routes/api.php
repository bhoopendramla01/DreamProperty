<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register', [App\Http\Controllers\HomeController::class, 'create'])->name('register');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/getCategory', [App\Http\Controllers\CategoryController::class, 'getCategory'])->name('getCategory');
Route::post('/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');
Route::delete('/destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy');
Route::post('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
Route::get('/getProperty', [App\Http\Controllers\PropertyController::class, 'getProperty'])->name('getProperty');
Route::post('/addProperty', [App\Http\Controllers\PropertyController::class, 'addProperty'])->name('addProperty');
Route::delete('/destroyProperty/{id}', [App\Http\Controllers\PropertyController::class, 'destroyProperty'])->name('destroyProperty');
Route::post('/updateProperty', [App\Http\Controllers\PropertyController::class, 'updateProperty'])->name('updateProperty');