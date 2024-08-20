<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

//HOME PAGE
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/users/', [UserController::class, 'index'])->name('articles.users.index');
Route::redirect('/', '/articles');

//CREATE ARTICLE PAGE AND STORE REQUEST
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/categories/create', [CategoryController::class, 'store']) ->name('categories.store');

//LOG IN PAGE AND LOG OUT
Route::get('/articles/login-page', function () {
    return view('articles.login-page');
})->name('articles.login-page');
Route::get('/articles/logout', [LoginController::class, 'logOut'])->name('articles.logout');
Route::post('/articles/login-page', [LoginController::class, 'authenticate'])->name('articles.login');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


//EDIT PAGE AND UPDATE REQUEST

Route::get('/articles/users/{user}', [UserController::class, 'show'])->name('articles.users.show');

Route::delete('/articles/users/{user}/{article}', [ArticleController::class, 'destroy'])->name('articles.users.destroy');
Route::get('/articles/users/{user}/{article}/edit', [ArticleController::class, 'edit'])->name('articles.users.edit');
Route::put('/articles/users/{user}/{article}', [ArticleController::class, 'update'])->name('articles.users.update');
//ARTICLE DELETE REQUEST


//POST A NEW COMMENT UNDER A SPECIFIC ARTICLE
Route::post('/articles/{article}', [CommentController::class, 'store'])->name('comments.store');

//CATEGORIES ROUTES
Route::get('articles/categories/create', [CategoryController::class, 'create']) ->name('articles.categories.create');
