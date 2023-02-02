<?php

namespace AgeekDev\Barcode\Contracts;

use AgeekDev\Barcode\Enums\Type;

interface ImageType
{
    public function generate(string $text): string;

    /**
     * @param  Type  $type
     * @return $this
     */
    public function type(Type $type): static;

    /**
     * @param  string  $foregroundColor
     * @return $this
     */
    public function foregroundColor(string $foregroundColor): static;

    /**
     * @param  int  $height
     * @return $this
     */
    public function height(int $height): static;

    /**
     * @param  int  $widthFactor
     * @return $this
     */
    public function widthFactor(int $widthFactor): static;
}
