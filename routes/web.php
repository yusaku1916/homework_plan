<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubmitController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
//Route::group(['middleware' => ['auth']], function(){
//});

Route::get('/', [WorkController::class, 'index'])->name('screen');

Route::post('/teacher/home', [WorkController::class, 'home_teacher'])->name('screen.teacher');

Route::get('/teacher/home/{student_id}', [WorkController::class, 'home_teacher_return'])->name('screen.return');

Route::get('/works/create', [WorkController::class, 'create'])->name('work.create');

Route::post('/works', [WorkController::class, 'homework_store']);

Route::get('/plans/create', [PlanController::class, 'plan_create']);

Route::post('/plans', [PlanController::class, 'plan_store']);

Route::get('/submits/create', [SubmitController::class, 'submit_create']);

Route::post('/submits', [SubmitController::class, 'submit_store']);
    
});

require __DIR__.'/auth.php';
