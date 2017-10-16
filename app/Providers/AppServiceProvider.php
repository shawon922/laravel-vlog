<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Redis;

use App\Post;
use App\Tag;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('includes.sidebar', function($view) {
            $view->with('archives', Post::archives());
            $view->with('tags', Tag::has('posts')->pluck('name'));
            $view->with('visitors', Redis::incr('visitors'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
