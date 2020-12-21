<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;
use App\Http\Controllers\ActionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NavController::class, 'show']);
Route::get('/home', [NavController::class, 'show']);
Route::get('/settings', [NavController::class, 'form']);
Route::get('/credits', [NavController::class, 'credits']);
Route::post('/game', [NavController::class, 'startGame']);