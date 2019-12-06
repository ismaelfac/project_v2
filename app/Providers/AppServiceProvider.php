<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory as Validator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(100);
        setlocale(LC_MONETARY, 'co_CO');
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
