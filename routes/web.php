<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LanguageController;

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
        Route::get('/', 'index')->name('cars.index');
        Route::get('/create', 'create')->name('cars.create');
        Route::post('/', 'store')->name('cars.store');
        Route::get('/cars/{car}', 'show')->name('cars.show');
        Route::get('/cars/{car}/edit', 'edit')->name('cars.edit');
        Route::put('/cars/{car}', 'update')->name('cars.update');
        Route::delete('/cars/{car}', 'destroy')->name('cars.destroy');
    });
});

Route::get('language/{lang}', [LanguageController::class, 'changeLanguage'])->name('locale');

require __DIR__.'/auth.php';
