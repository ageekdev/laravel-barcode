<?php

namespace AgeekDev\Barcode;

use AgeekDev\Barcode\Contracts\ImageType;
use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Types\TypeInterface;

abstract class AbstractGenerator implements ImageType
{
    /**
     * The foreground color of the barcode.
     */
    protected string|array $foregroundColor = '#000000';

    protected int $height;

    protected int $widthFactor;

    protected Type $type;

    public function __construct()
    {
        $this->foregroundColor = config('barcode.foreground_color');
        $this->widthFactor = config('barcode.width_factor');
        $this->height = config('barcode.height');
        $this->type = config('barcode.type');
    }

    protected function getBarcodeData(string $code, Type $type): Barcode
    {
        return $this->createDataBuilderForType($type)->getBarcodeData($code);
    }

    protected function createDataBuilderForType(Type $type): TypeInterface
    {
        return $type->class();
    }

    public function type(Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function foregroundColor(string $foregroundColor): static
    {
        $this->foregroundColor = $foregroundColor;

        return $this;
    }

    public function height(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function widthFactor(int $widthFactor): static
    {
        $this->widthFactor = $widthFactor;

        return $this;
    }
}
