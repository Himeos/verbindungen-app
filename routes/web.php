<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\GameController;


Route::get('/', [GameController::class, 'index'])->name('game.index');
Route::post('/check', [GameController::class, 'check'])->name('game.check');

Route::get('/update-used-cards', [WordController::class, 'updateUsedCards'])->name('update.cards');

Route::get('login', [AuthController::class,'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class,'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/updateword', [WordController::class, 'updateForm'])->name('updateword.form');
Route::get('/newword', [WordController::class, 'newForm'])->name('newword.form');

Route::get('/admin/words/create', [WordController::class, 'create'])->name('words.create');
Route::post('/store-game-data', [GameController::class, 'storeGameData'])->name('game.store');



