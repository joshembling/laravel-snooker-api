<?php

namespace JoshEmbling\Snooker;

use JoshEmbling\Snooker\Commands\SnookerCommand;
use JoshEmbling\Snooker\Services\SnookerService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SnookerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        // The config file is named for the API rather than the package, so it
        // has to be declared explicitly — `hasConfigFile()` would look for
        // laravel-snooker-api.php and silently merge nothing.
        $package
            ->name('laravel-snooker-api')
            ->hasConfigFile('snooker-api')
            ->hasViews()
            ->hasMigration('create_laravel_snooker_api_table')
            ->hasCommand(SnookerCommand::class);
    }

    /**
     * Bind through the package-tools hook rather than overriding register().
     * Overriding it without calling parent::register() skipped the whole
     * package registration, so the config file was never merged and
     * config('snooker-api') came back empty.
     */
    public function packageRegistered(): void
    {
        $this->app->singleton('snooker', fn (): SnookerService => new SnookerService);
    }
}
