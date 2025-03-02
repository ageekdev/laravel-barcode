<?php

use AgeekDev\Barcode\Enums\BarcodeType;
use AgeekDev\Barcode\Facades\Barcode;

it('can generate code 128 barcode', function () {
    $result = Barcode::imageType('jpg')
        ->useGd()
        ->foregroundColor('#000000')
        ->widthFactor(2)
        ->height(30)
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(202)
        ->and($imageInfo[1])->toEqual(30)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can generate code 39 barcode', function () {
    $result = Barcode::imageType('jpg')
        ->useGd()
        ->foregroundColor('#000000')
        ->widthFactor(1)
        ->type(BarcodeType::CODE_39)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(224)
        ->and($imageInfo[1])->toEqual(30)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can use different height', function () {
    $result = Barcode::imageType('jpg')
        ->useGd()
        ->foregroundColor('#000000')
        ->widthFactor(2)
        ->height(45)
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(202)
        ->and($imageInfo[1])->toEqual(45)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can use different width factor', function () {
    $result = Barcode::imageType('jpg')
        ->useGd()
        ->foregroundColor('#000000')
        ->widthFactor(5)
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(505)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can generate code 128 barcode imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('jpg')
        ->useImagick()
        ->foregroundColor('#000000')
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(202)
        ->and($imageInfo[1])->toEqual(30)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can generate code 39 barcode imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('jpg')
        ->useImagick()
        ->foregroundColor('#000000')
        ->widthFactor(1)
        ->type(BarcodeType::CODE_39)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(224)
        ->and($imageInfo[1])->toEqual(30)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can use different height imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('jpg')
        ->useImagick()
        ->foregroundColor('#000000')
        ->widthFactor(2)
        ->height(45)
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(202)
        ->and($imageInfo[1])->toEqual(45)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});

it('can use different width factor imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('jpg')
        ->useImagick()
        ->foregroundColor('#000000')
        ->widthFactor(5)
        ->type(BarcodeType::CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(505)
        ->and($imageInfo['mime'])->toEqual('image/jpeg');
});
