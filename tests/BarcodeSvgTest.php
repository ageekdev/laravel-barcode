<?php

use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Facades\Barcode;

it('can generate ean 13 barcode', function () {
    $generated = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(BarcodeType::EAN_13)
        ->generate('081231723897');

    expect($generated)->toBe(file_get_contents('tests/verified-files/081231723897-ean13.svg'));
});
