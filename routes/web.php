<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameSearchController;
use Illuminate\Support\Facades\Route;
use App\Services\IgdbService;

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

Route::get('/inventaire', [GameController::class, 'index'])->middleware(['auth'])->name('games.index');
Route::post('/games/store', [GameController::class, 'store'])->name('games.store');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');

Route::get('/search', [GameSearchController::class, 'index'])->name('games.search');

Route::get('/test-igdb', function (IgdbService $igdb) {
    return $igdb->searchGame('Zelda');
});

require __DIR__.'/auth.php';
