<?php

namespace AmmarAldwayma\LaravelMaker\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new third party service class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $customNamespace = config('laravel-maker.default_namespaces.service');

        return ! is_null($customNamespace) ? $customNamespace : $rootNamespace.'\Services';
    }

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/service.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): array|string
    {
        $serviceName = $this->argument('name');

        $replace = [
            '{{ serviceConfigName }}' => str($serviceName)
                ->afterLast('/')
                ->replaceLast('Service', '')
                ->snake()
                ->toString(),
        ];

        return str_replace(
            array_keys($replace),
            array_values($replace),
            parent::buildClass($name)
        );
    }
}
