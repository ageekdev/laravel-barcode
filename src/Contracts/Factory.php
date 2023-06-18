<?php

namespace AgeekDev\Barcode\Contracts;

interface Factory
{
    /**
     * Get a image type implementation.
     */
    public function imageType(string $name = null): ImageType;
}
