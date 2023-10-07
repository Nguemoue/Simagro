<?php

use App\Domains\Services\Controllers\AdminServiceController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ParametreController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\RealisationController;
use App\Http\Controllers\Admin\ResourcePublicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    "prefix" => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect','auth:admin']
], function () {
    Route::group(['prefix' => "admin","as"=>"admin."],function () {
        Route::prefix("home")->group(function (){
            Route::get("/", [AdminHomeController::class, "index"])->name("home");
        });
        Route::resource("services", AdminServiceController::class);
        Route::resource("realisations", RealisationController::class);
        //parametre
        Route::get("parametres",[ParametreController::class,"index"])->name("parametres.index");
        //publications
        Route::resource("publications",PublicationController::class);
        //resource des publication
        Route::resource("publications.resources", ResourcePublicationController::class);
    });
});

