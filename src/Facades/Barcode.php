<?php

namespace AgeekDev\Barcode\Facades;

use AgeekDev\Barcode\Contracts\ImageType;
use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Enums\Type;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ImageType foregroundColor(string $foregroundColor)
 * @method static ImageType height(int $height)
 * @method static ImageType widthFactor(int $widthFactor)
 * @method static ImageType type(BarcodeType|Type $type)
 * @method static ImageType imageType(?string $driver)
 * @method static ImageType useImagick()
 * @method static ImageType useGd()
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
