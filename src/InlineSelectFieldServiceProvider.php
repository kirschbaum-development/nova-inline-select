<?php

namespace KirschbaumDevelopment\Nova;

use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;

class InlineSelectFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Nova::serving(function () {
            Nova::script('inline-select', __DIR__ . '/../dist/js/field.js');
            Nova::style('inline-select', __DIR__ . '/../dist/css/field.css');
        });
    }
}
