<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        \App::bind('Pusher',function($app){
        $keys = $app['config']->get('services.pusher');

        return new \Pusher("430f556a15b28f8e0fd4","87d054a5239ffaebbd1b",'314066',array('cluster'=> 'ap1'));
        });
    }
}
