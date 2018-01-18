<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191); 

        //if you want to migrate the whole database then comment these 2 lines and uncomment after migrating
        $is_hired=DB::select('SELECT * FROM hire_info');
        view()->share('*', ['is_hired'=>$is_hired]);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
