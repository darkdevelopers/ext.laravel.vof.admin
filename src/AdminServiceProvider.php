<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;

/**
 * Class AdminServiceProvider
 * @package vof\Admin
 */
class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/Views', 'admin');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'admin');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([
            __DIR__.'/assets/css' => public_path('css/vof.admin'),
        ], 'ext.laravel.vof.admin');
        $this->publishes([
            __DIR__.'/config' => config_path(),
        ], 'ext.laravel.vof.admin');
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'ext.laravel.vof.admin');
        $this->publishes([
            __DIR__.'/app/Exceptions' => app_path('Exceptions'),
        ], 'ext.laravel.vof.admin');
        $this->publishes([
            __DIR__.'/app/Http/Middleware' => app_path('Http/Middleware'),
        ], 'ext.laravel.vof.admin');
    }

    public function register()
    {

    }
}
