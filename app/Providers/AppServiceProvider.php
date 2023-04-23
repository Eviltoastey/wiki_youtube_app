<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\YoutubeService;
use App\Services\WikipediaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(YoutubeService::class, function () {
            return new YoutubeService();
        });

        $this->app->bind(WikipediaService::class, function () {
            return new WikipediaService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
