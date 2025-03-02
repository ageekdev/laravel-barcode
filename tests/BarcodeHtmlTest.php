<?php

use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Facades\Barcode;

it('html barcode generator can generate code 128 barcode', function () {
    $generated = Barcode::imageType('html')
        ->foregroundColor('black')
        ->widthFactor(2)
        ->height(30)
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    expect($generated)->toBe(file_get_contents('tests/verified-files/081231723897-code128.html'));
});

it('html barcode generator can generate imb barcode to test heights', function () {
    $generated = Barcode::imageType('html')
        ->foregroundColor('black')
        ->widthFactor(2)
        ->height(30)
        ->type(BarcodeType::IMB)
        ->generate('12345678903');

    expect($generated)->toBe(file_get_contents('tests/verified-files/12345678903-imb.html'));
});
