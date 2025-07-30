<?php

namespace JoshEmbling\Snooker;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JoshEmbling\Snooker\Commands\SnookerCommand;
use JoshEmbling\Snooker\Services\SnookerService;

class SnookerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-snooker-api')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_snooker_api_table')
            ->hasCommand(SnookerCommand::class);
    }

    public function register()
    {
        //dd('here');
        $this->app->singleton('snooker', function () {
            return new SnookerService();
        });
    }

    public function boot()
    {
        //dd('here');
    }
}
