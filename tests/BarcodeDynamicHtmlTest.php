<?php

use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Facades\Barcode;

it('can generate code 128 barcode', function () {
    $generated = Barcode::imageType('dynamic_html')
        ->foregroundColor('black')
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    expect($generated)->toBe(file_get_contents('tests/verified-files/081231723897-dynamic-code128.html'));
});

it('can generate imb barcode to test heights', function () {
    $generated = Barcode::imageType('dynamic_html')
        ->foregroundColor('black')
        ->type(BarcodeType::IMB)
        ->generate('12345678903');

    expect($generated)->toBe(file_get_contents('tests/verified-files/12345678903-dynamic-imb.html'));
});
