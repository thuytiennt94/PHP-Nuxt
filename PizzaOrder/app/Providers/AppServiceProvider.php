<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CrustRepository;
use App\Repositories\CrustRepositoryInterface;
use App\Repositories\PizzaRepository;
use App\Repositories\PizzaRepositoryInterface;
use App\Repositories\ToppingRepository;
use App\Repositories\ToppingRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
     public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CrustRepositoryInterface::class, CrustRepository::class);
        $this->app->bind(ToppingRepositoryInterface::class, ToppingRepository::class);
        $this->app->bind(PizzaRepositoryInterface::class, PizzaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
