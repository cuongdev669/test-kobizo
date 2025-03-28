<?php

namespace App\Providers;

use App\Repository\MetaRepository;
use App\Repository\MetaRepositoryInterface;
use App\Repository\PostRepository;
use App\Repository\PostRepositoryInterface;
use App\Services\PostService;
use App\Services\MetaService;
use App\Services\RssService;
use App\Services\MetaServiceInterface;
use App\Services\PostServiceInterface;
use App\Services\RssServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            RssServiceInterface::class, RssService::class
        );
        $this->app->singleton(
            MetaServiceInterface::class, MetaService::class
        );
        $this->app->singleton(
            PostServiceInterface::class, PostService::class
        );
        $this->app->singleton(
            MetaRepositoryInterface::class, MetaRepository::class
        );
        $this->app->singleton(
            PostRepositoryInterface::class, PostRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
