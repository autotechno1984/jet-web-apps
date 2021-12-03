<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\Result;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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


        //View::share('markets', Result::where('status',1)->get());
        Paginator::useBootstrap();
        date_default_timezone_set('Asia/Jakarta');

    }
}
