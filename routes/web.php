<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController; 
use App\Http\Controllers\PlanController; 

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

Route::get('/plans/create', [PlanController::class, 'plan_create']);

Route::post('/plans', [PlanController::class, 'plan_store']);

Route::post('/submits/create', [PlanController::class, 'submit_create']);

Route::post('/submits', [PlanController::class, 'submit_store']);