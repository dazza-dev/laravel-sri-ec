<?php

namespace DazzaDev\LaravelSriEc;

use DazzaDev\LaravelSriEc\Commands\SriEcInstallCommand;
use DazzaDev\SriEc\Client;
use Illuminate\Support\ServiceProvider;

class LaravelSriEcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('laravel-sri-ec', function ($app) {
            $client = new Client(config('laravel-sri-ec.test'));

            // Set certificate
            if (config('laravel-sri-ec.certificate.path')) {
                $client->setCertificate([
                    'path' => config('laravel-sri-ec.certificate.path'),
                    'password' => config('laravel-sri-ec.certificate.password'),
                ]);
            }

            // Set path
            if (config('laravel-sri-ec.path')) {
                $client->setFilePath(config('laravel-sri-ec.path'));
            }

            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-sri-ec.php' => config_path('laravel-sri-ec.php'),
        ], 'laravel-sri-ec-config');

        // Migrations
        $this->publishes([
            $this->getMigrationFilePath('create_sri_configs_table.php') => database_path('migrations/'.$this->getMigrationFileName('create_sri_configs_table.php')),
            $this->getMigrationFilePath('create_sri_documents_table.php') => database_path('migrations/'.$this->getMigrationFileName('create_sri_documents_table.php')),
        ], 'laravel-sri-ec-migrations');

        // Lang
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-sri-ec');

        // Commands
        $this->commands([
            SriEcInstallCommand::class,
        ]);
    }

    /**
     * Get the migration file path.
     */
    protected function getMigrationFilePath(string $migrationFileName): string
    {
        return __DIR__.'/../database/migrations/'.$migrationFileName;
    }

    /**
     * Get the migration file name with current timestamp.
     */
    protected function getMigrationFileName(string $migrationFileName): ?string
    {
        return date('Y_m_d_His').'_'.$migrationFileName;
    }
}
