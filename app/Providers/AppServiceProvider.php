<?php

namespace App\Providers;

use App\Service\Attribute\AttributeService;
use App\Service\Attribute\AttributeServiceInterface;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceIntarface;
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
        $this->app->bind(AttributeServiceInterface::class,AttributeService::class);
        $this->app->bind(ProductServiceIntarface::class,ProductService::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
