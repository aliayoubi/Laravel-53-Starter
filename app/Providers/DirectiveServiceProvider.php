<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // include all *.php files
        foreach (glob(base_path('resources/views/directives/*.php')) as $filename) {
            require_once($filename);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
