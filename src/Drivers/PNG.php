<?php

namespace AgeekDev\Barcode\Drivers;

use AgeekDev\Barcode\AbstractGenerator;
use AgeekDev\Barcode\BarcodeBar;
use AgeekDev\Barcode\Exceptions\BarcodeException;
use Imagick;
use imagickdraw;
use imagickpixel;
use Spatie\Color\Hex;

class PNG extends AbstractGenerator
{
    protected bool $useImagick = true;

    /**
     * @throws BarcodeException
     */
    public function __construct()
    {
        parent::__construct();

        // Auto switch between GD and Imagick based on what is installed
        if (extension_loaded('imagick')) {
            $this->useImagick = true;
        } elseif (function_exists('imagecreate')) {
            $this->useImagick = false;
        } else {
            throw new BarcodeException('Neither gd-lib or imagick are installed!');
        }
    }

    /**
     * Force the use of Imagick image extension.
     *
     * @return $this
     */
    public function useImagick(): static
    {
        $this->useImagick = true;

        return $this;
    }

    /**
     * Force the use of the GD image library.
     *
     * @return $this
     */
    public function useGd(): static
    {
        $this->useImagick = false;

        return $this;
    }

    /**
     * @param  string  $text code to print
     *
     * @throws \ImagickDrawException
     * @throws \ImagickException
     * @throws \ImagickPixelException
     */
    public function generate(string $text): string
    {
        $barcodeData = $this->getBarcodeData($text, $this->type);
        $width = round($barcodeData->getWidth() * $this->widthFactor);

        $foregroundColor = $this->getForegroundColor();

        if ($this->useImagick) {
            $imagickBarsShape = new imagickdraw();
            $imagickBarsShape->setFillColor(new imagickpixel('rgb('.implode(',', $foregroundColor).')'));
        } else {
            $image = $this->createGdImageObject($width, $this->height);
            $gdForegroundColor = imagecolorallocate($image, $foregroundColor[0], $foregroundColor[1], $foregroundColor[2]);
        }

        // print bars
        $positionHorizontal = 0;
        /** @var BarcodeBar $bar */
        foreach ($barcodeData->getBars() as $bar) {
            $barWidth = round(($bar->getWidth() * $this->widthFactor), 3);

            if ($barWidth > 0 && $bar->isBar()) {
                $y = round(($bar->getPositionVertical() * $this->height / $barcodeData->getHeight()), 3);
                $barHeight = round(($bar->getHeight() * $this->height / $barcodeData->getHeight()), 3);

                // draw a vertical bar
                if ($this->useImagick) {
                    $imagickBarsShape->rectangle($positionHorizontal, $y, ($positionHorizontal + $barWidth - 1), ($y + $barHeight));
                } else {
                    imagefilledrectangle($image, $positionHorizontal, $y, ($positionHorizontal + $barWidth - 1), ($y + $barHeight), $gdForegroundColor);
                }
            }
            $positionHorizontal += $barWidth;
        }

        if ($this->useImagick) {
            $image = $this->createImagickImageObject($width, $this->height);
            $image->drawImage($imagickBarsShape);

            return $image->getImageBlob();
        }

        ob_start();
        $this->generateGdImage($image);

        return ob_get_clean();
    }

    /**
     * @return string|array
     */
    public function getForegroundColor(): string|array
    {
        $color = Hex::fromString($this->foregroundColor)->toRgba();

        return [$color->red(), $color->blue(), $color->green()];
    }

    protected function createGdImageObject(int $width, int $height)
    {
        $image = imagecreate($width, $height);
        $colorBackground = imagecolorallocate($image, 255, 255, 255);
        imagecolortransparent($image, $colorBackground);

        return $image;
    }

    /**
     * @throws \ImagickException
     */
    protected function createImagickImageObject(int $width, int $height): Imagick
    {
        $image = new Imagick();
        $image->newImage($width, $height, 'none', 'PNG');

        return $image;
    }

    protected function generateGdImage($image): void
    {
        imagepng($image);
        imagedestroy($image);
    }
}
