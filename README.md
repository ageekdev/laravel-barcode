<h1 align="center">Laravel Barcode</h1>

[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](https://laravel.com/docs/9.x)
[![Laravel 10.x](https://img.shields.io/badge/Laravel-10.x-red.svg?style=flat-square)](http://laravel.com/docs/10.x)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ageekdev/laravel-barcode/run-tests.yml?style=flat-square)](https://github.com/ageekdev/laravel-barcode/actions/workflows/run-tests.yml)

This package can generate SVG, PNG, JPG and HTML images from the most used 1D barcode standards. Here's how you can use it:

## Installation

You can install the package via composer:

```bash
composer require ageekdev/laravel-barcode
```

You can publish the config file with:
 
```bash
php artisan vendor:publish --tag="laravel-barcode-config"
```

## Usage

```php
use AgeekDev\Barcode\Facades\Barcode;
use AgeekDev\Barcode\Enums\Type;

$barcode = Barcode::imageType("svg")
                ->foregroundColor("#000000")
                ->height(30)
                ->widthFactor(2)
                ->type(Type::TYPE_CODE_128)
                ->generate("081231723897");
```

## Accepted barcode types
These barcode types are supported. All types support different character sets or have mandatory lengths. Please see wikipedia for supported chars and lengths per type.

Most used types are TYPE_CODE_128 and TYPE_CODE_39. Because of the best scanner support, variable length and most chars supported.

- TYPE_CODE_32 (italian pharmaceutical code 'MINSAN')
- TYPE_CODE_39
- TYPE_CODE_39_CHECKSUM
- TYPE_CODE_39E
- TYPE_CODE_39E_CHECKSUM
- TYPE_CODE_93
- TYPE_STANDARD_2_5
- TYPE_STANDARD_2_5_CHECKSUM
- TYPE_INTERLEAVED_2_5
- TYPE_INTERLEAVED_2_5_CHECKSUM
- TYPE_CODE_128
- TYPE_CODE_128_A
- TYPE_CODE_128_B
- TYPE_CODE_128_C
- TYPE_EAN_2
- TYPE_EAN_5
- TYPE_EAN_8
- TYPE_EAN_13
- TYPE_UPC_A
- TYPE_UPC_E
- TYPE_MSI
- TYPE_MSI_CHECKSUM
- TYPE_POSTNET
- TYPE_PLANET
- TYPE_RMS4CC
- TYPE_KIX
- TYPE_IMB
- TYPE_CODABAR
- TYPE_CODE_11
- TYPE_PHARMA_CODE
- TYPE_PHARMA_CODE_TWO_TRACKS

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/ageekdev/laravel-barcode/blob/main/.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tint Naing Win](https://github.com/tintnaingwinn)
- [All Contributors](../../contributors)

This package contains code copied from [PHP Barcode Generator](https://github.com/picqer/php-barcode-generator)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
