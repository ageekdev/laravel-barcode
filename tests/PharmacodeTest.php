<?php

use AgeekDev\Barcode\Exceptions\InvalidLengthException;
use AgeekDev\Barcode\Types\TypePharmacodeTwoCode;

it('validation triggered when generating zero code', function () {
    $pharmacode = new TypePharmacodeTwoCode;
    $pharmacode->getBarcodeData('0');
})->throws(InvalidLengthException::class);
