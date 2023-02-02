<?php

use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Facades\Barcode;

it('can generate code 128 barcode', function () {
    $generated = Barcode::imageType('dynamic_html')
        ->foregroundColor('black')
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $this->assertStringEqualsFile('tests/verified-files/081231723897-dynamic-code128.html', $generated);
});

it('can generate imb barcode to test heights', function () {
    $generated = Barcode::imageType('dynamic_html')
        ->foregroundColor('black')
        ->type(Type::TYPE_IMB)
        ->generate('12345678903');

    $this->assertStringEqualsFile('tests/verified-files/12345678903-dynamic-imb.html', $generated);
});
