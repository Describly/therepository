<?php

namespace TheNandan\TheRepository;

use Illuminate\Support\ServiceProvider;
use TheNandan\TheRepository\Console\Commands\MakeRepositoryCommand;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Contracts\Container\BindingResolutionException;
use TheNandan\TheRepository\Http\Middleware\RequestMapperMiddleware;
use TheNandan\TheRepository\Objects\Page;

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
        // Register commands
        $this->registerCommands();
        $this->app->singleton(Page::class);
    }

    /**
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->pushMiddleware();
        $this->mergeConfigFrom(__DIR__ . '/../config/therepository.php', 'therepository');

        $this->publishes([
            __DIR__ . '/../config/therepository.php' => config_path('therepository.php'),
        ]);
    }

    /**
     * This method register the console commands during the application boot process.
     */
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepositoryCommand::class
            ]);
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function pushMiddleware()
    {
        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(RequestMapperMiddleware::class);
    }
}
