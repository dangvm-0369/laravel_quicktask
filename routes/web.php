<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/users', UserController::class)->middleware(['admin']);

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

require __DIR__.'/auth.php';
