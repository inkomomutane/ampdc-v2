<?php

use App\Http\Controllers\Reports\GetReportByPeriodOfAct;
use App\Http\Controllers\Reports\GetReportByViolenceLocation;
use App\Http\Controllers\Reports\GetReportByViolenceReason;
use App\Http\Controllers\Reports\GetReportByViolenceTypeAndByYearController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\ArticleController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Website\ReportsController as WebsiteReportsController;
use App\Http\Controllers\Website\WelcomeController;
use App\Http\Controllers\WebsiteMessage\AnualReportsApiJsonController;
use App\Http\Controllers\WebsiteMessage\WebsiteMessageRegisterController;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('/about',AboutController::class)->name('about.us');

Route::get('/news',NewsController::class)->name('news');

Route::get('/news/{article}',ArticleController::class)->name('news.page');

Route::get('/contact', ContactController::class)->name('contact');

Route::post('/contact/send/message',WebsiteMessageRegisterController::class)->name('contact.message');

Route::get('/reports', WebsiteReportsController::class)->name('reports');


Route::get('/reports/year', AnualReportsApiJsonController::class)->name('api.reports.year');
Route::get('/reports/violence-type', GetReportByViolenceTypeAndByYearController::class)->name('api.reports.violence-type');
Route::get('/reports/period-of-act', GetReportByPeriodOfAct::class)->name('api.reports.period-of-act');
Route::get('/reports/violence-reason', GetReportByViolenceReason::class)->name('api.reports.violence-reason');
Route::get('/reports/violence-location',GetReportByViolenceLocation::class)->name('api.reports.violence-location');
