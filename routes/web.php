<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', UserController::class);

Route::controller(CarController::class)->group(function (){
   Route::prefix('/cars')->group(function (){
       Route::get('/', 'index')->name('tasks.index');
       Route::get('/create', 'create')->name('tasks.create');
       Route::post('/', 'store')->name('tasks.store');
       Route::get('/cars/{car}', 'show')->name('tasks.show');
       Route::get('/cars/{car}/edit', 'edit')->name('tasks.edit');
       Route::put('/cars/{car}', 'update')->name('tasks.update');
       Route::delete('/cars/{car}', 'destroy')->name('tasks.destroy');
   });
});
