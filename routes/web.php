<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/helloworld', function () {
    return view('welcome');
});

Route::get('/about', function () {
   return view('about');
  // echo 'about me';
  //dd('about me'); untuk debugging 
})->name('about');

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');

Route::get('/', [TaskController::class, 'index'])->name('task.index'); // Corrected arrow
Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
