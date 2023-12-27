<?php

namespace AmmarAldwayma\LaravelMaker\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeEnumCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name}';

    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new enum class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Enum';

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $customNamespace = config('laravel-maker.default_namespaces.enum');

        return !is_null($customNamespace) ? $customNamespace : $rootNamespace . '\Enums';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/enum.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param $name
     * @return array|string
     * @throws FileNotFoundException
     */
    protected function buildClass($name): array|string
    {
        $enumType = $this->choice('What is the type of enum ?', ['int', 'string'], 'int');

        $replace = [
            '{{ type }}' => $enumType,
        ];

        return str_replace(
            array_keys($replace),
            array_values($replace),
            parent::buildClass($name)
        );
    }
}
