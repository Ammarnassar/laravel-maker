# Laravel Maker: A Laravel Development Package for Creating Enums, Traits, Services Classes and more .

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ammarnassar/laravel-maker.svg?style=flat-square)](https://packagist.org/packages/ammarnassar/laravel-maker)
[![Total Downloads](https://img.shields.io/packagist/dt/ammarnassar/laravel-maker.svg?style=flat-square)](https://packagist.org/packages/ammarnassar/laravel-maker)

**Laravel Maker** is a powerful Laravel development package designed to help you to enhance your development process by
creating Enums, Traits, Interfaces, Services and more classes with a single command.

With Laravel Maker you can create the following classes:

- [Enums](#creating-a-new-enum)
- [Traits](#creating-a-new-trait)
- [Interfaces](#creating-a-new-interface)
- [Services](#creating-a-new-service--third-party-service)
- [Repositories](#creating-a-new-repository)

## Installation

You can install the package via composer:

```bash
composer require ammaraldwayma/laravel-maker --dev
```

## Usage

### Creating a new Enum

```bash
php artisan make:enum Statuses
```

This command will create a new enum class in the `app/Enums` directory. The class will be named `Statuses` and will
contain the following constants:

```php
<?php

namespace App\Enums;

enum Statuses: string
{
    //
}
```

[//]: # (You can also specify the values of the constants by passing them as arguments to the command:)

[//]: # ()

[//]: # (```bash)

[//]: # (php artisan make:enum Statuses PENDING APPROVED REJECTED)

[//]: # (```)

[//]: # ()

[//]: # (This will create the following enum class:)

[//]: # ()

[//]: # (```php)

[//]: # (<?php)

[//]: # ()

[//]: # (enum Statuses: string)

[//]: # ({)

[//]: # (    case PENDING = 'PENDING';)

[//]: # (    case APPROVED = 'APPROVED';)

[//]: # (    case REJECTED = 'REJECTED';)

[//]: # (})

[//]: # (```)

### Creating a new Trait

```bash
php artisan make:trait HasStatus
```

This command will create a new trait class in the `app/Traits` directory. The class will be named `HasStatus` and will
contain the following code:

```php
<?php

namespace App\Traits;

trait HasStatus
{
    //
}
```

### Creating a new Interface

```bash
php artisan make:interface UserRepositoryInterface
```

This command will create a new interface class in the `app/Interfaces` directory. The class will be
named `UserRepository` and will contain the following code:

```php
<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    //
}
```

### Creating a new Service / Third-party Service

```bash

php artisan make:service GoogleTranslationService
```

This command will create a new service class in the `app/Services` directory. The class will be
named `GoogleTranslationService` and will contain the following code:

```php
<?php

namespace App\Services;

class GoogleTranslationService
{
    /**
     * @param PendingRequest $httpClient
     * @param array $serviceKeys
     */
    public function __construct(
        protected PendingRequest $httpClient,
        protected array          $serviceKeys = [],
    )
    {
        $this->serviceKeys = config('services.google_translation');

        $this->httpClient = Http::asJson()
            ->acceptJson()
            ->withoutVerifying()
            ->baseUrl($this->serviceKeys['base_url'])
            ->timeout($this->serviceKeys['timeout']);
    }

    /**
     * Get {{ name }} data .
     *
     * @param array $data
     * @return array
     */
    public function get(array $data = []): array
    {
        $response = $this->httpClient->get('/');

        if ($response->failed()) {
            return [
                'status' => false,
                'data'   => [],
            ];
        }

        return [
            'status' => true,
            'data'   => $response->json(),
        ];
    }
}
```

### Creating a new Repository

```bash
php artisan make:repo UserRepository
```

This command will create a new repository class in the `app/Repositories` directory. The class will be
named `UserRepository` and will contain the following code:

```php
<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @param User $user
     */
    public function __construct(
        protected User $user,
    )
    {
        //
    }
}
```

## Customizing the default namespaces

You can customize the default namespaces for the different types of classes that you can generate it by the package by

- Publishing the config file:

```bash
php artisan vendor:publish --tag="maker-config"
```

- Changing the values of the `default_namespaces` array in the published config file:

```php
return [
    /*
     |--------------------------------------------------------------------------
     | Default Namespaces
     |--------------------------------------------------------------------------
     | Here you can specify the default namespaces for the different types of
     | classes that you can generate it by the package.
     |
    */
    'default_namespaces' => [
        'enum' => 'App\Enums',
        'trait' => 'App\Traits',
        'interface' => 'App\Interfaces',
        'service' => 'App\Services',
        'repository' => 'App\Repositories',
    ],
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
