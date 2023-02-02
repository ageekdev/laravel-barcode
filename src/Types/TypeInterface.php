<?php

namespace AgeekDev\Barcode\Types;

use AgeekDev\Barcode\Barcode;

interface TypeInterface
{
    public function getBarcodeData(string $code): Barcode;
}
