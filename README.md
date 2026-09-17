# Laravel 12+ Genderize.io API Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pixelpeter/laravel-genderize-api-client.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel-genderize-api-client)
[![Total Downloads](https://img.shields.io/packagist/dt/pixelpeter/laravel-genderize-api-client.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel-genderize-api-client)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Coverage Status](https://coveralls.io/repos/github/pixelpeter/laravel-genderize-api-client/badge.svg?branch=master)](https://coveralls.io/github/pixelpeter/laravel-genderize-api-client?branch=master)
[![Tests](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/run-tests.yml)
[![Fix PHP code style issues](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/fix-php-code-style-issues.yml)
[![PHPStan](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/phpstan.yml/badge.svg)](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/phpstan.yml)
[![dependabot-auto-merge](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/dependabot-auto-merge.yml/badge.svg)](https://github.com/pixelpeter/laravel-genderize-api-client/actions/workflows/dependabot-auto-merge.yml)

A simple Laravel 12+ client for the [Genderize.io API](https://genderize.io/).
It provides a fluent interface for easy request building.

## Version overview

From `v13.0.0` on, the package major version matches the highest Laravel major version it supports. `v13.0.0` supports
Laravel 13.x and 12.x. This is the only maintained line: `master` is where it is developed, and the `v13.x` branch
tracks it and carries the released state.

| Laravel    | php           | composer | branch        |
|------------|---------------|----------|---------------|
| 13.x, 12.x | 8.5, 8.4, 8.3 | `^13.0`  | master, v13.x |

### Deprecated releases

Earlier releases stay installable and unchanged, but they are no longer maintained: they receive no fixes and no
further releases. Laravel 11.x and 10.x are past their security support window, and Composer refuses to install them
because of published security advisories.

| Laravel    | php           | composer | tag      | status                            |
|------------|---------------|----------|----------|-----------------------------------|
| 12.x, 11.x | 8.4, 8.3, 8.2 | `^12.0`  | v12.0.0  | deprecated, superseded by `^13.0` |
| 10.x       | 8.3, 8.2, 8.1 | `^10.0`  | v10.2.0  | deprecated, no successor          |
| 9.x, 8.x   | 8.2, 8.1, 8.0 | `^8.0`   | v8.2.0   | deprecated, no successor          |

The Laravel 5.x releases live in the archived
[pixelpeter/laravel5-genderize-api-client](https://github.com/pixelpeter/laravel5-genderize-api-client) repository:
`2.0.x` for Laravel 5.7 and 5.6, `1.1.x`/`2.0.x` for Laravel 5.5. That repository is read-only.

## Installation

### Step 1: Install Through Composer
``` bash
composer require pixelpeter/laravel-genderize-api-client
```

### Step 2: Use the Facade
Package discovery registers the service provider and the `Genderize` alias, so there is nothing to add by hand. If you
have disabled discovery for this package, register the alias in `bootstrap/app.php` or use the facade class directly:
```php
use Pixelpeter\Genderize\Facades\Genderize;
```
### Step 3: Publish the configuration file
This is only needed when you have an API key from Genderize.io
```php
php artisan vendor:publish --provider="Pixelpeter\Genderize\GenderizeServiceProvider"
```

## Examples

### Send requests
#### Single name
```php
use Genderize;

Genderize::name('Peter')->get();
```

#### Multiple names (max. 10)
```php
use Genderize;

Genderize::name(['John', 'Jane'])->get();

// or for better readability you can use the plural
Genderize::names(['John', 'Jane'])->get();
```

#### Add language and country options
```php
use Genderize;

Genderize::name('John')->country('US')->lang('EN')->get();
```
### Working with the response
#### For single usage
```php
use Genderize;

$response = Genderize::name('Peter')->get();

print $response->result->gender; // 'male'
print $response->result->name; // 'Peter'
print $response->result->probability; '0.99'
print $response->result->count; 144
print $response->result->isMale(); true
print $response->result->isFemale(); false
print $response->result->isNotMale(); false
print $response->result->isNotFemale(); true
```

#### For batch usage
```php
use Genderize;

$response = Genderize::names(['John', 'Jane'])->country('US')->lang('EN')->get();

foreach($response->result as $row)
{
    print $row->name;
}
```

### Getting information about the request and limits
```php
use Genderize;

$response = Genderize::name('Peter')->get();

print $response->meta->code; // 200 - HTTP response code
print $response->meta->limit; // 1000 - Max number of allowed requests
print $response->meta->remaining; // 950 - Number of requests left
print $response->meta->reset->diffInSeconds(); // Carbon\Carbon - time left till reset
```

### More documentation
Refer to [Genderize.io API Documentation](https://genderize.io/documentation/) for more examples and documentation.

## Testing
Run the tests with:
```bash
vendor/bin/phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
