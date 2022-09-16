<?php

namespace Yuraplohov\LaravelExample\Providers;

use Illuminate\Support\ServiceProvider;
use Yuraplohov\LaravelExample\Console\Commands\ExampleCommand;

class LaravelExampleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([
                __DIR__ . '/../../config/example.php' => config_path('example.php'),
            ]);

            $this->commands([
                ExampleCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
    }
}