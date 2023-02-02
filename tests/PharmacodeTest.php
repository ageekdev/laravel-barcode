<?php

it('validation triggered when generating zero code', function () {
    $pharmacode = new AgeekDev\Barcode\Types\TypePharmacodeTwoCode();

    $this->expectException(AgeekDev\Barcode\Exceptions\InvalidLengthException::class);

    $pharmacode->getBarcodeData('0');
});
