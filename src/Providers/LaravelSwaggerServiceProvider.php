<?php

declare(strict_types=1);

namespace Akaramires\LaravelSwagger\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelSwaggerServiceProvider extends ServiceProvider
{
    protected bool $defer = false;

    public function boot(): void
    {
        $this->configurePublishing();
    }

    public function configurePublishing(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $source = realpath($raw = __DIR__ . '/../config/laravel-swagger.php')
            ?: $raw;

        $this->publishes([$source => $this->app->configPath('laravel-swagger.php')]);
    }

    public function register(): void
    {
    }
}
