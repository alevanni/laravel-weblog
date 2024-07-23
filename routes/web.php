<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

//HOME PAGE
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::redirect('/', '/articles');

//CREATE ARTICLE PAGE AND STORE REQUEST
Route::get('/articles/create', function () { 
    return view('articles.create');

})->name('articles.create');


//LOG IN PAGE
Route::get('/articles/login-page', function () {
    return view('articles.login-page');
})->name('articles.login-page');
Route::post('/articles/login-page', [LoginController::class, 'authenticate'])->name('articles.login');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


//EDIT PAGE AND UPDATE REQUEST
Route::get('/articles/users/{user}', [UserController::class, 'show'])->name('articles.users.show');
Route::delete('/articles/users/{user}/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/articles/{user}/{article}/edit', function () {})->name('articles.edit');
Route::put('/articles/{user}/{article}', function () {})->name('articles.update');
//ARTICLE DELETE REQUEST


//POST A NEW COMMENT UNDER A SPECIFIC ARTICLE
Route::post('/articles/{article}', [CommentController::class, 'store'])->name('comments.store');