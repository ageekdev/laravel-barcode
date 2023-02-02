<?php

namespace AgeekDev\Barcode\Facades;

use AgeekDev\Barcode\Enums\Type;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \AgeekDev\Barcode\Contracts\ImageType foregroundColor(string $foregroundColor)
 * @method static \AgeekDev\Barcode\Contracts\ImageType height(int $height)
 * @method static \AgeekDev\Barcode\Contracts\ImageType widthFactor(int $widthFactor)
 * @method static \AgeekDev\Barcode\Contracts\ImageType type(Type $type)
 * @method static \AgeekDev\Barcode\Contracts\ImageType imageType(?string $driver)
 * @method static \AgeekDev\Barcode\Contracts\ImageType useImagick()
 * @method static \AgeekDev\Barcode\Contracts\ImageType useGd()
 * @method static string generate(string $text)
 *
 * @see \AgeekDev\Barcode\BarcodeManager
 */
class Barcode extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-barcode';
    }
}
