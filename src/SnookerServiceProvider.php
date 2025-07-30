<?php

namespace JoshEmbling\Snooker;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JoshEmbling\Snooker\Commands\SnookerCommand;

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
}
