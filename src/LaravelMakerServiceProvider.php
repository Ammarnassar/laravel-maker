<?php

namespace AmmarAldwayma\LaravelMaker;

use AmmarAldwayma\LaravelMaker\Commands\MakeClassCommand;
use AmmarAldwayma\LaravelMaker\Commands\MakeEnumCommand;
use AmmarAldwayma\LaravelMaker\Commands\MakeInterfaceCommand;
use AmmarAldwayma\LaravelMaker\Commands\MakeRepositoryCommand;
use AmmarAldwayma\LaravelMaker\Commands\MakeServiceCommand;
use AmmarAldwayma\LaravelMaker\Commands\MakeTraitCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMakerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-maker')
            ->hasConfigFile('laravel-maker')
            ->hasCommands([
                MakeEnumCommand::class,
                MakeTraitCommand::class,
                MakeInterfaceCommand::class,
                MakeServiceCommand::class,
                MakeRepositoryCommand::class,
                MakeClassCommand::class,
            ]);
    }
}
