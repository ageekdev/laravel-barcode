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

    $this->assertEquals('PNG', substr($generated, 1, 3));
});

it('can generate code 39 barcode', function () {
    $result = Barcode::widthFactor(1)
        ->type(Type::TYPE_CODE_39)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    $this->assertGreaterThan(100, strlen($result));
    $this->assertEquals(224, $imageInfo[0]); // Image width
    $this->assertEquals(30, $imageInfo[1]); // Image height
    $this->assertEquals('image/png', $imageInfo['mime']);
});

it('can use different height', function () {
    $result = Barcode::height(45)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    $this->assertGreaterThan(100, strlen($result));
    $this->assertEquals(202, $imageInfo[0]); // Image width
    $this->assertEquals(45, $imageInfo[1]); // Image height
    $this->assertEquals('image/png', $imageInfo['mime']);
});

it('can use different width factor', function () {
    $result = Barcode::foregroundColor('#000000')
        ->widthFactor(5)
        ->type(Type::TYPE_CODE_128)
        ->generate('081231723897');

    $imageInfo = getimagesizefromstring($result);

    $this->assertGreaterThan(100, strlen($result));
    $this->assertEquals(505, $imageInfo[0]); // Image width
    $this->assertEquals('image/png', $imageInfo['mime']);
});

it('can generate code 128 barcode imagick', function () {
    if (! extension_loaded('imagick')) {
        $this->markTestSkipped();
    }

    $generated = Barcode::imageType('png')
        ->type(Type::TYPE_CODE_128)
        ->useImagick()
        ->generate('081231723897');

    $this->assertEquals('PNG', substr($generated, 1, 3));
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

    $this->assertGreaterThan(100, strlen($result));
    $this->assertEquals(224, $imageInfo[0]); // Image width
    $this->assertEquals(30, $imageInfo[1]); // Image height
    $this->assertEquals('image/png', $imageInfo['mime']);
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

    $this->assertGreaterThan(100, strlen($result));
    $this->assertEquals(202, $imageInfo[0]); // Image width
    $this->assertEquals(45, $imageInfo[1]); // Image height
    $this->assertEquals('image/png', $imageInfo['mime']);
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

    $this->assertGreaterThan(100, strlen($result));
    $this->assertEquals(505, $imageInfo[0]); // Image width
    $this->assertEquals('image/png', $imageInfo['mime']);
});
