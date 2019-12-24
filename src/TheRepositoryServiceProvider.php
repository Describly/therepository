<?php

namespace TheNandan\TheRepository;

use Illuminate\Support\ServiceProvider;

/**
 * Class TheRepositoryServiceProvider
 * @package TheNandan\TheRepository
 */
class TheRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     *
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'therepository.config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'therepository');
    }

}
