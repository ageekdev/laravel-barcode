<?php

namespace AgeekDev\Barcode\Drivers;

use Imagick;

class JPG extends PNG
{
    protected function createImagickImageObject(int $width, int $height): Imagick
    {
        $image = new Imagick();
        $image->newImage($width, $height, 'white', 'JPG');

        return $image;
    }

    protected function generateGdImage($image): void
    {
        imagejpeg($image);
        imagedestroy($image);
    }
}
