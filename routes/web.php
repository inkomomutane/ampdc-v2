<?php


use App\Enums\Roles;
use App\Http\Controllers\Article\CreateArticleController;
use App\Http\Controllers\Article\DeleteArticleController;
use App\Http\Controllers\Article\EditArticleController;
use App\Http\Controllers\Article\ListArticlesController;
use App\Http\Controllers\Article\StoreArticleController;
use App\Http\Controllers\Article\UpdateArticleController;
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
use App\Http\Controllers\Perpetrator\DeletePerpetratorController;
use App\Http\Controllers\Perpetrator\ListPerpetratorsController;
use App\Http\Controllers\Perpetrator\StorePerpetratorController;
use App\Http\Controllers\Perpetrator\UpdatePerpetratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Province\CreateProvince;
use App\Http\Controllers\Province\DeleteProvince;
use App\Http\Controllers\Province\GetProvinces;
use App\Http\Controllers\Province\UpdateProvince;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SupposedReasonOfViolence\DeleteSupposedReasonOfViolenceController;
use App\Http\Controllers\SupposedReasonOfViolence\ListSupposedReasonOfViolencesController;
use App\Http\Controllers\SupposedReasonOfViolence\StoreSupposedReasonOfViolenceController;
use App\Http\Controllers\SupposedReasonOfViolence\UpdateSupposedReasonOfViolenceController;
use App\Http\Controllers\User\CreateUser;
use App\Http\Controllers\User\DeleteUser;
use App\Http\Controllers\User\GetUsers;
use App\Http\Controllers\User\UpdateUser;
use App\Http\Controllers\Victim\Cases\CreateVictimCaseController;
use App\Http\Controllers\Victim\Cases\DeleteVictimCase;
use App\Http\Controllers\Victim\Cases\ExportVictimCasesController;
use App\Http\Controllers\Victim\Cases\ListVictimCases;
use App\Http\Controllers\Victim\Cases\RegisterVictimDataController;
use App\Http\Controllers\Victim\Cases\ShowVictimCaseData;
use App\Http\Controllers\Victim\Cases\StoreVictimCaseController;
use App\Http\Controllers\Victim\EditDataOfVictimController;
use App\Http\Controllers\Victim\Forwarded\ListOfReceivedCases;
use App\Http\Controllers\Victim\RegisterDataOfVictimController;
use App\Http\Controllers\Victim\UpdateVictimDataController;
use App\Http\Controllers\ViolenceIncidentLocation\DeleteViolenceIncidentLocationController;
use App\Http\Controllers\ViolenceIncidentLocation\ListViolenceIncidentLocationsController;
use App\Http\Controllers\ViolenceIncidentLocation\StoreViolenceIncidentLocationController;
use App\Http\Controllers\ViolenceIncidentLocation\UpdateViolenceIncidentLocationController;
use App\Http\Controllers\ViolenceType\DeleteViolenceTypeController;
use App\Http\Controllers\ViolenceType\ListViolenceTypesController;
use App\Http\Controllers\ViolenceType\StoreViolenceTypeController;
use App\Http\Controllers\ViolenceType\UpdateViolenceTypeController;
use Illuminate\Support\Facades\Route;

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
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


include 'website.php';


Route::get('/dashboard', static function () {

    $role = Auth::user()?->roles()->first()->name;

    if (Roles::WRITER->value === $role ) {
        return to_route('article.create');
    }
   return to_route('victim.create');
}
)->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(callback: function () {

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


    #--- User Routes ---#
    Route::get('/dashboard/users', GetUsers::class)->name('user.all');
    Route::post('/dashboard/user', CreateUser::class)->name('user.store');
    Route::match(['put', 'patch'], '/dashboard/user/{user}', UpdateUser::class)->name('user.update');
    Route::delete('/dashboard/user/{user}', DeleteUser::class)->name('user.status');

    #--- Violence Type Routes ViolenceType---#
    Route::get('/violenceType/list', ListViolenceTypesController::class)->name('violenceType.list');
    Route::post('/violenceType/store', StoreViolenceTypeController::class)->name('violenceType.store');
    Route::match(['put','patch'],'/violenceType/{violenceType}/update', UpdateViolenceTypeController::class)->name('violenceType.update');
    Route::delete('/violenceType/{violenceType}/delete', DeleteViolenceTypeController::class)->name('violenceType.delete');

    #--- Perpetrator Routes ---#
    Route::get('/perpetrators/list', ListPerpetratorsController::class)->name('perpetrator.list');
    Route::post('/perpetrator/store', StorePerpetratorController::class)->name('perpetrator.store');
    Route::match(['put','patch'],'/perpetrator/{perpetrator}/update', UpdatePerpetratorController::class)->name('perpetrator.update');
    Route::delete('/perpetrator/{perpetrator}/delete', DeletePerpetratorController::class)->name('perpetrator.delete');


    #--- supposedReasonOfViolences Routes ---#
    Route::get('/supposedReasonOfViolences/list', ListSupposedReasonOfViolencesController::class)->name('supposedReasonOfViolence.list');
    Route::post('/supposedReasonOfViolence/store', StoreSupposedReasonOfViolenceController::class)->name('supposedReasonOfViolence.store');
    Route::match(['put','patch'],'/supposedReasonOfViolence/{supposedReasonOfViolence}/update', UpdateSupposedReasonOfViolenceController::class)->name('supposedReasonOfViolence.update');
    Route::delete('/supposedReasonOfViolence/{supposedReasonOfViolence}/delete', DeleteSupposedReasonOfViolenceController::class)->name('supposedReasonOfViolence.delete');

    #--- ViolenceIncidentLocation Routes ---#
    Route::get('/violenceIncidentLocations/list', ListViolenceIncidentLocationsController::class)->name('violenceIncidentLocation.list');
    Route::post('/violenceIncidentLocation/store', StoreViolenceIncidentLocationController::class)->name('violenceIncidentLocation.store');
    Route::match(['put','patch'],'/violenceIncidentLocation/{violenceIncidentLocation}/update', UpdateViolenceIncidentLocationController::class)->name('violenceIncidentLocation.update');
    Route::delete('/violenceIncidentLocation/{violenceIncidentLocation}/delete', DeleteViolenceIncidentLocationController::class)->name('violenceIncidentLocation.delete');

    #--- Victims ---#
    Route::post('/victim/register/data', RegisterVictimDataController::class)->name('victim.data.store');
    Route::post('/victim/update/{victim}/data', UpdateVictimDataController::class)->name('victim.data.update');

    Route::get('/victim/create',RegisterDataOfVictimController::class)->name('victim.create');
    Route::get('/victim/{victim}/edit', EditDataOfVictimController::class)->name('victim.edit');
    Route::get('/victim/case/{case}/edit', \App\Http\Controllers\Victim\Cases\EditDataOfVictimCaseController::class)
        ->name('victim.case.edit');

    Route::get('/victim/{victim}/create/case',CreateVictimCaseController::class)->name('victim.case.create');
    Route::post('/victim/{victim}/store/case', StoreVictimCaseController::class)->name('victim.case.store');
    Route::match(['put','patch','post'],'/victim/{case}/update', \App\Http\Controllers\Victim\Cases\UpdateVictimCaseController::class)->name('victim.case.update');

    Route::delete('/victim/{case}/delete', DeleteVictimCase::class)->name('victim.case.delete');

    // forwarded cases

    Route::get('forwarded/cases',\App\Http\Controllers\Victim\Forwarded\ListOfForwardedCases::class)
        ->name('forwarded.cases');
    Route::get('received/cases', ListOfReceivedCases::class)
        ->name('received.cases');


    Route::get('/victims/cases',ListVictimCases::class)->name('victim.cases.list');
//    Route::get('/victims/received-cases', GetReceivedVictimCasesController::class)->name('victim.received.cases.list');
//    Route::get('/victims/forwarded-cases', GetForwardedVictimCasesController::class)->name('victim.forwarded.cases.list');
    Route::get('/export/victims/cases', ExportVictimCasesController::class)->name('export.victims.cases');
    Route::get('/show/victimCase/{victim}/info', ShowVictimCaseData::class)->name('victim.case.info');
//    Route::match(['put','patch','post'],'/update/victimCase/{case}', UpdateDataOfVictimCaseController::class)->name('victim.case.update');

    #--- Reports ---#

    Route::get('/dashboard/reports', ReportsController::class)->name('dashboard.reports');


    #--- articles ---#

    Route::get('article/list',ListArticlesController::class)->name('article.list');
    Route::get('/article/create', CreateArticleController::class)->name('article.create');
    Route::post('store/article',StoreArticleController::class)->name('article.store');
    Route::get('/article/edit/{article}', EditArticleController::class)->name('article.edit');
    Route::match(['put','patch','post'],'/article/update/{article}',UpdateArticleController::class)->name('article.update');
    Route::delete('/article/delete/{article}',DeleteArticleController::class)->name('article.delete');

    #--- website messages ---#

    Route::get('/website/messages', \App\Http\Controllers\WebsiteMessage\GetWebsiteMessagesController::class)->name('website.message.list');
    Route::delete('/website/message/{message}', \App\Http\Controllers\WebsiteMessage\DeleteWebsiteMessageController::class)->name('website.message.delete');
    Route::match(['put','patch','post'],'/website/message/{message}/change', \App\Http\Controllers\WebsiteMessage\ChangeWebsiteReadMessageStateController::class)->name('website.message.update');

});

require  __DIR__.'/print.php';
require __DIR__.'/auth.php';
