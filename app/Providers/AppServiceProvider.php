<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Team\Entities\Team;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        View::composer('frontend.layouts.header', 'App\View\FrontComposer');
        View::composer('frontend.layouts.sidebar', 'App\View\FrontComposer');

        View::composer('frontend.layouts.footer', function ($view) {
            $team = Team::all();
            $view->with('teams', $team);
        });
        Paginator::useBootstrap();

    }
}
