<?php

use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\ArticleController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Website\ReportsController;
use App\Http\Controllers\Website\WelcomeController;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('/about',AboutController::class)->name('about.us');

Route::get('/news',NewsController::class)->name('news');

Route::get('/news/{article}',ArticleController::class)->name('news.page');

Route::get('/contact', ContactController::class)->name('contact');

Route::post('/contact',static fn() => 'contact')->name('contact.message');

Route::get('/reports', ReportsController::class)->name('reports');
