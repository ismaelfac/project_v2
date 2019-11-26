<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory as Validator; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->validator->extendImplicit('no_html', function ($attribute, $value, $parameters) {
            return strlen($value) == strlen(strip_tags($value));
        }, 'You can\'t use html here !');
    }
}
