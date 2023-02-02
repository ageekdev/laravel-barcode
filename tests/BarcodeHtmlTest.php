<?php

use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Facades\Barcode;

it('html_barcode_generator_can_generate_code_128_barcode', function () {
    $generated = Barcode::imageType('html')
        ->foregroundColor('black')
        ->widthFactor(2)
        ->height(30)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $this->assertStringEqualsFile('tests/verified-files/081231723897-code128.html', $generated);
});

it('html_barcode_generator_can_generate_imb_barcode_to_test_heights', function () {
    $generated = Barcode::imageType('html')
        ->foregroundColor('black')
        ->widthFactor(2)
        ->height(30)
        ->type(Type::TYPE_IMB)
        ->generate('12345678903');

    $this->assertStringEqualsFile('tests/verified-files/12345678903-imb.html', $generated);
});
