<?php

use App\Http\Controllers\Client\ClientTestimonyController;
use App\Http\Controllers\Client\ServiceController;
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
       $mail = Mail::to("lucchuala@gmail.com")->send(new \App\Mail\testMail());
       dd($mail);
    });
    Route::get('/', [HomeController::class, "index"])->name("home");
    Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');
    Route::middleware(['auth:web',"password.confirm"])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    //services
    Route::as("client.")->group(callback: function(){
        Route::get("services", [ServiceController::class,"index"])->name("services.index");
        Route::resource("testimonies", ClientTestimonyController::class);
    });
    Route::get("/facebook/login", [FacebookController::class, "index"])->name("facebook.login");
});

require __DIR__ . '/auth.php';
