<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Route as RouteFacade;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);
          if (app()->isProduction()){
              URL::forceScheme('https');
          }
    }
}
