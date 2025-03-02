<?php

namespace AgeekDev\Barcode\Contracts;

use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Enums\Type;

interface ImageType
{
    public function generate(string $text): string;

    public function type(BarcodeType|Type $type): static;

    public function foregroundColor(string $foregroundColor): static;

    public function height(int $height): static;

    public function widthFactor(int $widthFactor): static;
}
