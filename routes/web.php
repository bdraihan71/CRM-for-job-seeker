<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StageController;
use Illuminate\Support\Facades\Route;

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
})->middleware(['auth', 'verified']);

Route::get('/test', function (){
    return view('backend.test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/stage', [StageController::class, 'index'])->name('stage.index');
    Route::post('/stage', [StageController::class, 'store'])->name('stage.store');
    Route::put('/stage/{id}', [StageController::class, 'update'])->name('stage.update');
    Route::delete('/stage/{id}', [StageController::class, 'destroy'])->name('stage.destroy');

    Route::get('/application', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/application/create', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');
    Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('application.update');
    Route::delete('/application/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy');

});




require __DIR__.'/auth.php';
