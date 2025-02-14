<?php

namespace Vendor\Categories\App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class InstallCategoriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install The Categories Package';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Publish configuration
        $this->info('Publishing configuration...');
        $this->call('vendor:publish', ['--tag' => 'categories-config', '--force' => true]);

        // Publish migrations
        $this->info('Publishing migrations...');
        $this->call('vendor:publish', ['--tag' => 'categories-migrations', '--force' => true]);

        // Publish views
        $this->info('Publishing views...');
        $this->call('vendor:publish', ['--tag' => 'categories-views', '--force' => true]);

        // Publish controllers
        $this->info('Publishing controllers...');
        $this->call('vendor:publish', ['--tag' => 'categories-controllers', '--force' => true]);

        // Publish models
        $this->info('Publishing models...');
        $this->call('vendor:publish', ['--tag' => 'categories-models', '--force' => true]);

        // Publish routes
        $this->info('Publishing routes...');
        $this->call('vendor:publish', ['--tag' => 'categories-routes', '--force' => true]);

        // Run migrations
        $this->info('Running migrations...');
        $this->call('migrate');

        // Output a success message
        $this->info('Categories package installed successfully.');
    }
}
