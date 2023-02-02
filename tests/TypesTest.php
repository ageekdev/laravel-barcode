<?php

use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Facades\Barcode;

it('can generate code 39 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_39)
        ->generate('1234567890ABC');

    $this->assertStringEqualsFile('tests/verified-files/C39-1234567890ABC.svg', $result);
});

it('can generate code 39 checksum barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_39_CHECKSUM)
        ->generate('1234567890ABC');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate code 39 extended barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_39E)
        ->generate('1234567890abcABC');

    $this->assertStringEqualsFile('tests/verified-files/C39E-1234567890abcABC.svg', $result);
});

it('can generate code 39 extended checksum barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_39E_CHECKSUM)
        ->generate('1234567890abcABC');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate code 93 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_93)
        ->generate('1234567890abcABC');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate standard 2 5 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_STANDARD_2_5)
        ->generate('1234567890');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate standard 2 5 checksum barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_STANDARD_2_5_CHECKSUM)
        ->generate('1234567890');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate interleaved 2 5 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_INTERLEAVED_2_5)
        ->generate('1234567890');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate interleaved 2 5 checksum barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_INTERLEAVED_2_5_CHECKSUM)
        ->generate('1234567890');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate code 128 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_128)
        ->generate('1234567890abcABC-283*33');

    $this->assertStringEqualsFile('tests/verified-files/C128-1234567890abcABC-283-33.svg', $result);
});

it('can generate code 128 a barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_128_A)
        ->generate('1234567890');

    $this->assertStringEqualsFile('tests/verified-files/C128A-1234567890.svg', $result);
});

it('can generate code 128 b barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_128_B)
        ->generate('1234567890abcABC-283*33');

    $this->assertStringEqualsFile('tests/verified-files/C128B-1234567890abcABC-283-33.svg', $result);
});

it('can generate ean 2 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_2)
        ->generate('22');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate ean 5 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_5)
        ->generate('1234567890abcABC-283*33');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate ean 8 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_8)
        ->generate('1234568');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate ean 13 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('1234567890');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate upc a barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_UPC_A)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate upc e barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_UPC_E)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate msi barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_MSI)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate msi checksum barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_MSI_CHECKSUM)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate postnet barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_POSTNET)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate planet barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_PLANET)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate rms 4 cc barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_RMS4CC)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate kix barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_KIX)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate imb barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_IMB)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate codabar barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODABAR)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate code 11 barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_11)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate pharma code barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_PHARMA_CODE)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});

it('can generate pharma code 2 tracks barcode', function () {
    $result = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_PHARMA_CODE_TWO_TRACKS)
        ->generate('123456789');

    $this->assertGreaterThan(100, strlen($result));
});
