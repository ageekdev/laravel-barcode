<?php

use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Facades\Barcode;

it('can generate code 128 barcode', function () {
    $generated = Barcode::useGd()
        ->foregroundColor('#000000')
        ->widthFactor(2)
        ->height(30)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    expect(substr($generated, 1, 3))->toBe('PNG');
});

it('can generate code 39 barcode', function () {
    $result = Barcode::widthFactor(1)
        ->type(Type::TYPE_CODE_39)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(224)
        ->and($imageInfo[1])->toEqual(30)
        ->and($imageInfo['mime'])->toEqual('image/png');
});

it('can use different height', function () {
    $result = Barcode::height(45)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(202)
        ->and($imageInfo[1])->toEqual(45)
        ->and($imageInfo['mime'])->toEqual('image/png');
});

it('can use different width factor', function () {
    $result = Barcode::foregroundColor('#000000')
        ->widthFactor(5)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(505)
        ->and($imageInfo['mime'])->toEqual('image/png');

});

it('can generate code 128 barcode imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $generated = Barcode::imageType('png')
        ->type(Type::TYPE_CODE_128)
        ->useImagick()
        ->generate('081231723897');

    expect(substr($generated, 1, 3))->toBe('PNG');
});

it('can generate code 39 barcode imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('png')
        ->useImagick()
        ->foregroundColor('#000000')
        ->widthFactor(1)
        ->type(Type::TYPE_CODE_39)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(224)
        ->and($imageInfo[1])->toEqual(30)
        ->and($imageInfo['mime'])->toEqual('image/png');
});

it('can use different height imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('png')
        ->useImagick()
        ->foregroundColor('#000000')
        ->widthFactor(2)
        ->height(45)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(202)
        ->and($imageInfo[1])->toEqual(45)
        ->and($imageInfo['mime'])->toEqual('image/png');
});

it('can use different width factor imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $result = Barcode::imageType('png')
        ->useImagick()
        ->foregroundColor('#000000')
        ->widthFactor(5)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    expect(strlen($result))->toBeGreaterThan(100)
        ->and($imageInfo[0])->toEqual(505)
        ->and($imageInfo['mime'])->toEqual('image/png');
});
