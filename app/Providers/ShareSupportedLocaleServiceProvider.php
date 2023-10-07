<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ShareSupportedLocaleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $supportedLocales = LaravelLocalization::getSupportedLocales();
        \Illuminate\Support\Facades\View::share("supportedLocales",collect($supportedLocales));
    }
}
