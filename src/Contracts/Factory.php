<?php

namespace AgeekDev\Barcode\Contracts;

interface Factory
{
    /**
     * Get a image type implementation.
     *
     * @param  string|null  $name
     * @return ImageType
     */
    public function imageType(string $name = null): ImageType;
}
