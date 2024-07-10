<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

//HOME PAGE
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::redirect('/', '/articles');

//CREATE PAGE AND STORE REQUEST
Route::get('/articles/{user}/create', function () {})->name('articles.create');
Route::post('/articles/{user}', function () {})->name('articles.store');
//EDIT PAGE AND UPDATE REQUEST
Route::get('/articles/{user}/{article}/edit', function () {})->name('articles.edit');
Route::put('/articles/{user}/{article}', function () {})->name('articles.update');
//ARTICLE DELETE REQUEST
Route::delete('/articles/{user}/{article}', function () {})->name('articles.destroy');