<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get ('/', [PublicController::class, 'homepage'])->name ('homepage');

// creo rotte per crud 
Route::resource('articles', ArticleController::class);

// rotta per la vista index
// Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

// rotta per la vista show
// Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// rotta per la vista filtra per categoria
Route::get('/articles/category/{category}', [ArticleController::class, 'bycategory'])->name('articles.bycategory');

// rotta per la vista filtra per autore
Route::get('/articles/user/{user}', [ArticleController::class, 'byuser'])->name('articles.byuser');