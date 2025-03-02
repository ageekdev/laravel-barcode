<h1 align="center">Laravel Barcode</h1>

<p align="center">
    <img src="https://banners.beyondco.de/Laravel%20Barcode.png?theme=light&packageManager=composer+require&packageName=ageekdev%2Flaravel-barcode&pattern=architect&style=style_1&description=Generate+barcodes+easily+in+your+Laravel+application&md=1&showWatermark=0&fontSize=100px&images=barcode&widths=200&heights=200" width="650">
</p>

<p align="center">
    <a href="https://packagist.org/packages/ageekdev/laravel-barcode"><img alt="Latest Version on Packagist" src="https://img.shields.io/packagist/v/ageekdev/laravel-barcode.svg?style=flat-square&logo=Packagist"></a>
    <a href="https://github.com/ageekdev/laravel-barcode/actions/workflows/run-tests.yml"><img alt="GitHub Tests Action Status" src="https://img.shields.io/github/actions/workflow/status/ageekdev/laravel-barcode/run-tests.yml?style=flat-square"></a>
    <a href="https://packagist.org/packages/ageekdev/laravel-barcode"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/ageekdev/laravel-barcode.svg?style=flat-square&logo=Packagist"></a>
    <a href="https://laravel.com/docs/9.x"><img alt="Laravel 9.x" src="https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square"></a>
    <a href="https://laravel.com/docs/10.x"><img alt="Laravel 10.x" src="https://img.shields.io/badge/Laravel-10.x-red.svg?style=flat-square"></a>
    <a href="https://laravel.com/docs/11.x"><img alt="Laravel 11.x" src="https://img.shields.io/badge/Laravel-11.x-red.svg?style=flat-square"></a>
    <a href="https://laravel.com/docs/12.x"><img alt="Laravel 12.x" src="https://img.shields.io/badge/Laravel-12.x-red.svg?style=flat-square"></a>
</p>

# Laravel Barcode Generator

A package to generate barcodes in various formats (SVG, PNG, JPG, HTML) for Laravel applications.

## ⚙️ Installation

You can install the package via Composer:

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
use AgeekDev\Barcode\Enums\BarcodeType;

$barcode = Barcode::imageType("svg")
                ->foregroundColor("#000000")
                ->height(30)
                ->widthFactor(2)
                ->type(BarcodeType::CODE_128)
                ->generate("081231723897");
```

## Accepted barcode types
These barcode types are supported. All types support different character sets or have mandatory lengths. Please see wikipedia for supported chars and lengths per type.

Most used types are CODE_128 and CODE_39. Because of the best scanner support, variable length and most chars supported.

- CODE_32 (italian pharmaceutical code 'MINSAN')
- CODE_39
- CODE_39_CHECKSUM
- CODE_39E
- CODE_39E_CHECKSUM
- CODE_93
- STANDARD_2_5
- STANDARD_2_5_CHECKSUM
- INTERLEAVED_2_5
- INTERLEAVED_2_5_CHECKSUM
- CODE_128
- CODE_128_A
- CODE_128_B
- CODE_128_C
- EAN_2
- EAN_5
- EAN_8
- EAN_13
- UPC_A
- UPC_E
- MSI
- MSI_CHECKSUM
- POSTNET
- PLANET
- RMS4CC
- KIX
- IMB
- CODABAR
- CODE_11
- PHARMA_CODE
- PHARMA_CODE_TWO_TRACKS

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

- [All Contributors](../../contributors)

This package contains code copied from [PHP Barcode Generator](https://github.com/picqer/php-barcode-generator)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
