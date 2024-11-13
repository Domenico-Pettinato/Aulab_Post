<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\RevisorController;

Route::get ('/', [PublicController::class, 'homepage'])->name ('homepage');

// creo rotte per crud 
Route::resource('articles', ArticleController::class);

// rotta per la vista index
 Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

// rotta per la vista show
 Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// rotta per la vista filtra per categoria
Route::get('/articles/category/{category}', [ArticleController::class, 'bycategory'])->name('articles.bycategory');

// rotta per la vista filtra per autore
Route::get('/articles/user/{user}', [ArticleController::class, 'byuser'])->name('articles.byuser');

// rotta per candidarsi
Route::get('/candidature', [PublicController::class, 'candidature'])->name('candidature');

// rotta per gestire le candidature
Route::post('/candidature/submit', [PublicController::class, 'submit'])->name('candidature.submit');

// rotta admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/Dashboard' , [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// rotta per attivare il ruola scelto per la candidatura
Route::middleware('admin')->group(function () {
    Route::patch ('admin/{user}/set->admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch ('admin/{user}/set->revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch ('admin/{user}/set->writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});

// rotta revisore
Route::middleware('revisor')->group(function () {
    Route::get('/revisor/Dashboard' , [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
});

// rotta che permette al revisore di accettare o rifiutare un articolo
Route::middleware('revisor')->group(function () {
    Route::post ('revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post ('revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post ('revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});