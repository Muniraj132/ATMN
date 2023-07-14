<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;


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
        // if (config('app.env') === 'production') {
        // URL::forceScheme('https');
        // }
        $this->app['request']->server->set('HTTPS', $this->app->environment() != 'local');
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        if (env('APP_FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }
        
    }
}
