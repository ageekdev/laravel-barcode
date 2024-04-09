<?php

namespace AgeekDev\Barcode\Contracts;

interface Factory
{
    /**
     * Get image type implementation.
     */
    public function imageType(?string $name = null): ImageType;
}
