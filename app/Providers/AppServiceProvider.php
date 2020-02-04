<?php

namespace App\Providers;

use App\Http\Repositories\CategoryRepo\CategoryRepo;
use App\Http\Repositories\CategoryRepo\CategoryRepoInterface;
use App\Http\Repositories\ProductRepo\ProductRepo;
use App\Http\Repositories\ProductRepo\ProductRepoInterface;
use App\Http\Repositories\UserRepo\UserRepo;
use App\Http\Repositories\UserRepo\UserRepoInterface;
use App\Http\Services\CategoryService\CategoryService;
use App\Http\Services\CategoryService\CategoryServiceInterface;
use App\Http\Services\ProductService\ProductService;
use App\Http\Services\ProductService\ProductServiceInterface;
use App\Http\Services\UserService\UserService;
use App\Http\Services\UserService\UserServiceInterface;
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
        $this->app->singleton(UserRepoInterface::class,UserRepo::class);
        $this->app->singleton(UserServiceInterface::class,UserService::class);
        $this->app->singleton(CategoryRepoInterface::class,CategoryRepo::class);
        $this->app->singleton(CategoryServiceInterface::class,CategoryService::class);
        $this->app->singleton(ProductRepoInterface::class,ProductRepo::class);
        $this->app->singleton(ProductServiceInterface::class,ProductService::class);
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
