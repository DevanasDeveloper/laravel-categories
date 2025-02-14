<?php

namespace Vendor\Categories\App\Providers;

use Illuminate\Support\ServiceProvider;
use Vendor\Categories\App\Console\Commands\InstallCategoriesCommand;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../Config/categories.php', 'categories');
        // Register the command
        $this->commands([
            InstallCategoriesCommand::class,
        ]);
        // Merge Configuration
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         // Publish Configuration
         $this->publishes([
            __DIR__.'/../../config/categories.php' => config_path('categories.php'),
        ], 'categories-config');

        // Publish Migrations
        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('migrations'),
        ], 'categories-migrations');

        // Publish Views
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views'),
        ], 'categories-views');

        // Publish Controllers
        $this->publishes([
            __DIR__.'/../../app/Http/Controllers' => app_path('Http/Controllers'),
        ], 'categories-controllers');

        // Publish Models
        $this->publishes([
            __DIR__.'/../../app/Models' => app_path('Models'),
        ], 'categories-models');

        // Publish Routes
        $this->publishes([
            __DIR__.'/../../routes/categories.php' => base_path('routes/categories.php'),
        ], 'categories-routes');

        // Load Views from Package
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'categories');
        // Register Console Command
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCategoriesCommand::class,
            ]);
        }
    }
}
