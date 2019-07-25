<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\QueryRepository;
use App\Models\Repositories\PostRepository;
use App\Models\Contracts\PostQueryRepository;
use App\Models\Repositories\AuthorRepository;
use App\Models\Contracts\AuthorQueryRepository;
use App\Models\Repositories\TagRepository;
use App\Models\Contracts\TagQueryRepository;
use App\Models\Repositories\PostTagRepository;
use App\Models\Contracts\PostTagQueryRepository;
use App\Models\Repositories\CategoryPostRepository;
use App\Models\Contracts\CategoryPostQueryRepository;
use App\Models\Repositories\CategoryRepository;
use App\Models\Contracts\CategoryQueryRepository;

use App\ServiceUpdateFiles\UpdateImage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostQueryRepository::class, PostRepository::class);
        $this->app->singleton(AuthorQueryRepository::class, AuthorRepository::class);
        $this->app->singleton(TagQueryRepository::class, TagRepository::class);
        $this->app->singleton(PostTagQueryRepository::class, PostTagRepository::class);
        $this->app->singleton(CategoryPostQueryRepository::class, CategoryPostRepository::class);
        $this->app->singleton(CategoryQueryRepository::class, CategoryRepository::class);
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
