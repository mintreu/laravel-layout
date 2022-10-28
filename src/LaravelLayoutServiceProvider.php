<?php

namespace Mintreu\LaravelLayout;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mintreu\LaravelLayout\Commands\LaravelLayoutCommand;

class LaravelLayoutServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-layout')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-layout_table')
            ->hasCommand(LaravelLayoutCommand::class);
    }
}
