<?php

namespace Christopheredjohnson\LaravelFileParser;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Christopheredjohnson\LaravelFileParser\Commands\LaravelFileParserCommand;

class LaravelFileParserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-file-parser')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-file-parser_table')
            ->hasCommand(LaravelFileParserCommand::class);
    }
}
