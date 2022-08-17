<?php

namespace App\Providers;

use App\Providers\ProviderInterfaces\ProviderOneInterface;
use App\Providers\ProviderInterfaces\ProviderTwoInterface;
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
        $this->app->bind(ProviderOneInterface::class, ProviderOne::class);
        $this->app->bind(ProviderTwoInterface::class, ProviderTwo::class);
    }
}
