<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get ('/', [PublicController::class, 'homepage'])->name ('homepage');

// creo rotte per crud 
Route::resource('articles', ArticleController::class);