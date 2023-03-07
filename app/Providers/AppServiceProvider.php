<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

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
        //
        Arr::macro('toUpper', function ($array) {
            return array_map(function ($value) {
                return is_string($value) ? strtoupper($value) : $value;
            }, $array);
        });
    }
}
