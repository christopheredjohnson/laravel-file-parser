<?php

namespace Christopheredjohnson\LaravelFileParser;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelFileParserServiceProvider extends PackageServiceProvider
{
    public function packageRegistered()
    {
        $this->app->singleton(FileParserManager::class, function () {

            $manager = new FileParserManager();

            $parsers = collect(config('file-parser.parsers', []));

            $parsers->each(function ($parser, $type) use ($manager) {

                $manager->registerParser($type, app()->make($parser));
            });

            return $manager;
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-file-parser')
            ->hasConfigFile();
    }
}
