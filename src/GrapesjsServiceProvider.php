<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class GrapesjsServiceProvider extends ServiceProvider 
{
    const CONFIG_PATH = __DIR__ . '/../config';
    const ROUTE_PATH = __DIR__ . '/../routes';
    const VIEW_PATH = __DIR__ . '/views';
    const ASSET_PATH = __DIR__ . '/../assets';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load configuration files

        $this->publishes([
            self::CONFIG_PATH => config_path()
        ], 'config');

        // Load assets files
        $this->publishes([
            self::ASSET_PATH => public_path('lamoud-grapesjs')
        ], 'assets');

        // Load route files
        $this->loadRoutesFrom(self::ROUTE_PATH . '/web.php');

        // Load views
        $this->loadViewsFrom(self::VIEW_PATH, 'lamoud-grapesjs');

        Blade::directive('GrapesjsScript', function ($expression) {
            $output = "<script src=\"{{asset('lamoud-grapesjs/dist/grapes.min.js')}}\"></script>";
            return $output;
        });

        Blade::directive('GrapesjsStyle', function ($expression) {
            $output = "<link href=\"{{asset('lamoud-grapesjs/dist/css/grapes.min.css')}}\" rel=\"stylesheet\" />";
            return $output;
        });
    }

        /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register any services, bindings, or other things here
        $this->mergeConfigFrom(
            self::CONFIG_PATH . '/lamoud-grapesjs.php',
            'lamoud-grapesjs'
        );
    }
}