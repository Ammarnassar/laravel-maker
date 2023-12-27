# Laravel Maker: Streamlining Laravel Development with Enhanced Artisan Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ammarnassar/laravel-maker.svg?style=flat-square)](https://packagist.org/packages/ammarnassar/laravel-maker)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ammarnassar/laravel-maker/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ammarnassar/laravel-maker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ammarnassar/laravel-maker/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ammarnassar/laravel-maker/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ammarnassar/laravel-maker.svg?style=flat-square)](https://packagist.org/packages/ammarnassar/laravel-maker)

Laravel Maker is a powerful Laravel package designed to elevate your development experience by introducing a set of custom Artisan commands. These commands are meticulously crafted to simplify and expedite the creation of essential components in your Laravel application, fostering a more efficient and organized development workflow.

## Installation

You can install the package via composer:

```bash
composer require ammaraldwayma/laravel-maker --dev
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="maker-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [AmmarNassar](https://github.com/Ammarnassar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
