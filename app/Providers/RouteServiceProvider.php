<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     
            $this->app['router']->group([
            'namespace' => 'App\Http\Controllers',
            ], function ($router) {

            require base_path('routes/web.php');

            });

            $this->app['router']->group([
            'namespace' => 'App\Http\Controllers',
            'prefix'=>'api'
            ], function ($router) {

            require base_path('routes/api.php');

            });     
    }

    public function boot(){
          
    }

}
