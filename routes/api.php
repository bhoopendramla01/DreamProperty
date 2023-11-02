<?php

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register', [App\Http\Controllers\HomeController::class, 'create'])->name('register');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/index',[UserController::class,'index']);