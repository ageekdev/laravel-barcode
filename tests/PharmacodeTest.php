<?php

it('validation triggered when generating zero code', function () {
    $pharmacode = new AgeekDev\Barcode\Types\TypePharmacodeTwoCode;
    $pharmacode->getBarcodeData('0');
})->throws(AgeekDev\Barcode\Exceptions\InvalidLengthException::class);
