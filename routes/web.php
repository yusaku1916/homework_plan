<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController; 

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

/*Route::get('/', function () {
    return view('home.screen');
});*/

Route::get('/', [WorkController::class, 'index']); 

Route::get('/works/create', [WorkController::class, 'create']);

Route::post('/works', [WorkController::class, 'homework_store']);