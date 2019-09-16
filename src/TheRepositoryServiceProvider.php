<?php

namespace TheNandan\TheRepository;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Integration\Betternoi\Http\Middleware\CallbackRequestLogger;
use Integration\Betternoi\Provider\RouteServiceProvider;
use Integration\Betternoi\Provider\ScreeningIntegrationServiceProvider;

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
