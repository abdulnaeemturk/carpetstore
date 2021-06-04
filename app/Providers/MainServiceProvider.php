<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Interfaces
use App\RepositoryInterfaces\BaseRepositoryInterface;
use App\RepositoryInterfaces\Category\CategoryRepositoryInterface;
use App\RepositoryInterfaces\Color\ColorRepositoryInterface;

// repositories
use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Color\ColorRepository;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        //bind interface with the repository
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ColorRepositoryInterface::class, ColorRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
