<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

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
    Route::get('/admin/Dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// rotta per attivare il ruola scelto per la candidatura
Route::middleware('admin')->group(function () {
    Route::patch('admin/{user}/set->admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('admin/{user}/set->revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('admin/{user}/set->writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store)', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});

// rotta revisore
Route::middleware('revisor')->group(function () {
    Route::get('/revisor/Dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
});

// rotta che permette al revisore di accettare o rifiutare un articolo
Route::middleware('revisor')->group(function () {
    Route::post('revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

// rotta della barra di ricerca
Route::get('/article/search', [PublicController::class, 'articleSearch'])->name('article.search');

// rotta per il writer

Route::get('/writer/Dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');

Route::middleware('writer')->group(function () {
    Route::get(('/article/edit/{article}'), [WriterController::class, 'edit'])->name('article.edit');
    Route::put(('/article/update/{article}'), [WriterController::class, 'update'])->name('article.update');
    Route::delete(('/article/destroy/{article}'), [WriterController::class, 'destroy'])->name('article.destroy');
});
