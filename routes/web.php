<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

//HOME PAGE
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::redirect('/', '/articles');

//CREATE ARTICLE PAGE AND STORE REQUEST
Route::get('/articles/create', function () { 
    return view('articles.create');

})->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
//EDIT PAGE AND UPDATE REQUEST
Route::get('/articles/{user}/{article}/edit', function () {})->name('articles.edit');
Route::put('/articles/{user}/{article}', function () {})->name('articles.update');
//ARTICLE DELETE REQUEST
Route::delete('/articles/{user}/{article}', function () {})->name('articles.destroy');

//POST A NEW COMMENT UNDER A SPECIFIC ARTICLE
Route::post('/articles/{article}', [CommentController::class, 'store'])->name('comments.store');