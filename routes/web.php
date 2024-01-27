<?php


use App\Http\Controllers\District\CreateDistrict;
use App\Http\Controllers\District\DeleteDistrict;
use App\Http\Controllers\District\GetDistricts;
use App\Http\Controllers\District\UpdateDistrict;
use App\Http\Controllers\Neighborhood\CreateNeighborhood;
use App\Http\Controllers\Neighborhood\DeleteNeighborhood;
use App\Http\Controllers\Neighborhood\GetNeighborhoods;
use App\Http\Controllers\Neighborhood\UpdateNeighborhood;
use App\Http\Controllers\Organization\DeleteOrganizationController;
use App\Http\Controllers\Organization\ListOrganizationsController;
use App\Http\Controllers\Organization\StoreOrganizationController;
use App\Http\Controllers\Organization\UpdateOrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Province\CreateProvince;
use App\Http\Controllers\Province\DeleteProvince;
use App\Http\Controllers\Province\GetProvinces;
use App\Http\Controllers\Province\UpdateProvince;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    #--- Organization Routes ---#
    Route::get('/organization/list', ListOrganizationsController::class)->name('organization.list');
    Route::post('/organization/store', StoreOrganizationController::class)->name('organization.store');
    Route::match(['put','patch'],'/organization/{organization}/update', UpdateOrganizationController::class)->name('organization.update');
    Route::delete('/organization/{organization}/delete', DeleteOrganizationController::class)->name('organization.delete');

    #--- Province Routes ---#

    Route::get('/province/list', GetProvinces::class)->name('province.list');
    Route::post('/province/store', CreateProvince::class)->name('province.store');
    Route::match(['put','patch'],'/province/{province}/update', UpdateProvince::class)->name('province.update');
    Route::delete('/province/{province}/delete', DeleteProvince::class)->name('province.delete');


    #--- District Routes ---#

    Route::get('/district/list', GetDistricts::class)->name('district.list');
    Route::post('/district/store', CreateDistrict::class)->name('district.store');
    Route::match(['put','patch'],'/district/{district}/update', UpdateDistrict::class)->name('district.update');
    Route::delete('/district/{district}/delete', DeleteDistrict::class)->name('district.delete');

    #--- Neighborhood Routes ---#

    Route::get('/neighborhood/list', GetNeighborhoods::class)->name('neighborhood.list');
    Route::post('/neighborhood/store', CreateNeighborhood::class)->name('neighborhood.store');
    Route::match(['put','patch'],'/neighborhood/{neighborhood}/update', UpdateNeighborhood::class)->name('neighborhood.update');
    Route::delete('/neighborhood/{neighborhood}/delete', DeleteNeighborhood::class)->name('neighborhood.delete');

});

require __DIR__.'/auth.php';
