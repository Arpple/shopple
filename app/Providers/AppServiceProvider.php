<?php

namespace App\Providers;

use App\Core\Catalog\Boundary\IProductRepo;
use App\Core\Catalog\Test\ExampleProductsRepo;
use App\Core\User\Boundary\IUserRepo;
use App\Core\User\Test\SingleUserRepo;
use App\Repo\User\UserRepo;
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
        // $this->app->singleton(IUserRepo::class, fn () => new SingleUserRepo);

        $this->app->singleton(IUserRepo::class, fn () => new UserRepo);
        $this->app->singleton(IProductRepo::class, fn () => new ExampleProductsRepo);
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
