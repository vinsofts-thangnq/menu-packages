<?php

namespace Thangbeo\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        include __DIR__.'/model/menu.php';
        include __DIR__.'/controller/MenuController.php';
        $this->publishes([__DIR__.'/public/build' => public_path('build'),], 'public'); //cop public trong packages ra public cua app
        $this->publishes([__DIR__.'/public/vendors' => public_path('vendors'),], 'vendors');
        $this->publishes([__DIR__.'/public/js' => public_path('/jsnestable'),], 'jsnestable');
        $this->loadViewsFrom(__DIR__.'/views', 'menu');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadViewsFrom(__DIR__.'/views', 'menu');
    }
}
