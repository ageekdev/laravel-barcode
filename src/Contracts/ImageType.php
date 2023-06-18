<?php

namespace AgeekDev\Barcode\Contracts;

use AgeekDev\Barcode\Enums\Type;

interface ImageType
{
    public function generate(string $text): string;

    public function type(Type $type): static;

    public function foregroundColor(string $foregroundColor): static;

    public function height(int $height): static;

    public function widthFactor(int $widthFactor): static;
}
