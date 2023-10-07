<?php

use App\Domains\Services\Controllers\ClientServiceController;
use App\Http\Controllers\Client\ClientDashboardTestimonyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
    'middleware' => ['localeSessionRedirect', 'localizationRedirect']
], function () {
    Route::get("/test",function (){
       return view("test");
    });
    Route::get("tap-event",function (){
        broadcast(new \App\Events\PresenceEvent());
    });
    Route::get('/', [HomeController::class, "index"])->name("home");


    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', DashboardController::class)->middleware(['verified'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::as("client.dashboard")->prefix("dashboard/")->resource("dashboard/testimonies", ClientDashboardTestimonyController::class)
            ->except("create","show");
    });

    Route::as("client.")->group(callback: function(){
        //service client
        Route::get("services", [ClientServiceController::class,"index"])->name("services.index");
        Route::get("services/{service}/show",[ClientServiceController::class,"show"])->name("services.show");
        Route::get("temoignages",\App\Http\Controllers\Client\TemoignageController::class)->name("temoignages.index");
        Route::resource("membres",\App\Http\Controllers\Client\ClientMembreController::class)
            ->except("destroy","update","store","edit","create");
        Route::get("quote",[\App\Http\Controllers\Client\QuoteController::class,"index"])->name('quote.index');
        Route::post("quote",[\App\Http\Controllers\Client\QuoteController::class,"store"])->name('quote.store');
        Route::get("plan",[\App\Http\Controllers\Client\ClientPlanController::class,"index"])->name("plan.index");
        Route::post("plan/store",[\App\Http\Controllers\Client\ClientPlanController::class,"store"])->name("plan.store");
    });

    Route::get("/facebook/login", [FacebookController::class, "index"])->name("facebook.login");
});

require __DIR__ . '/auth.php';
