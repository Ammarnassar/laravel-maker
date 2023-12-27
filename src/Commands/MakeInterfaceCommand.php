<?php

namespace AmmarAldwayma\LaravelMaker\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeInterfaceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name} {base?}';

    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new interface class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Interface';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($basePath = $this->argument('base')) {
            return $rootNamespace.'\\'.$basePath;
        }

        $customNamespace = config('laravel-maker.default_namespaces.interface');

        return ! is_null($customNamespace) ? $customNamespace : $rootNamespace.'\Contracts';
    }

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/interface.stub';
    }
}
