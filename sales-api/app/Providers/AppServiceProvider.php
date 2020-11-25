<?php

namespace App\Providers;

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
        $this->app->bind('App\Interfaces\RepositoryInterface', 'App\Repositories\CustomerRepository');
        $this->app->bind('App\Interfaces\RepositoryInterface', 'App\Repositories\InstallmentRepository');
        $this->app->bind('App\Interfaces\RepositoryInterface', 'App\Repositories\AddressRepository');
        $this->app->bind('App\Interfaces\RepositoryInterface', 'App\Repositories\SalesRepository');
    }
}
