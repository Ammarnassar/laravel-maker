<?php

namespace AmmarAldwayma\LaravelMaker\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeRepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $customNamespace = config('laravel-maker.default_namespaces.repository');

        return ! is_null($customNamespace) ? $customNamespace : $rootNamespace.'\Repositories';
    }

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/repository.stub';
    }

    /**
     * Handle the command.
     *
     * @throws FileNotFoundException
     */
    public function handle(): ?bool
    {
        $interfaceName = $this->argument('name').'Interface';

        $this->call('make:interface', [
            'base' => 'Repositories/Interfaces',
            'name' => $interfaceName,
        ]);

        return parent::handle();
    }

    /**
     * Build the class with the given name.
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): array|string
    {
        $repositoryName = $this->argument('name');

        $model = str($this->qualifyModel($repositoryName))
            ->replaceLast('Repository', '')
            ->toString();

        $replace = [
            '{{ model }}' => $model ? "$model::class" : 'null',
            '{{ interface }}' => $repositoryName.'Interface',
            '{{ interfaceImport }}' => $this->qualifyClass("Interfaces/$repositoryName".'Interface'),
        ];

        return str_replace(
            array_keys($replace),
            array_values($replace),
            parent::buildClass($name)
        );
    }
}
