<?php

use AgeekDev\Barcode\Enums\Type;
use AgeekDev\Barcode\Exceptions\InvalidCharacterException;
use AgeekDev\Barcode\Exceptions\InvalidCheckDigitException;
use AgeekDev\Barcode\Exceptions\InvalidLengthException;
use AgeekDev\Barcode\Facades\Barcode;

it('throws exception if empty barcode is used in ean 13', function () {
    Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('');
})->throws(InvalidLengthException::class);

it('throws exception if empty barcode is used in code 128', function () {
    Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_CODE_128)
        ->generate('');
})->throws(InvalidLengthException::class);

it('ean 13 generator throws exception if invalid chars are used', function () {
    Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('A123');
})->throws(InvalidCharacterException::class);

it('ean 13 generator accepting 13 chars', function () {
    $generated = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('0049000004632');

    $this->assertStringEqualsFile('tests/verified-files/0049000004632-ean13.svg', $generated);
});

it('ean 13 generator accepting 12 chars and generates 13 th check digit', function () {
    $generated = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('004900000463');

    $this->assertStringEqualsFile('tests/verified-files/0049000004632-ean13.svg', $generated);
});

it('ean 13 generator accepting 11 chars and generates 13 th check digit and adds leading zero', function () {
    $generated = Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('04900000463');

    $this->assertStringEqualsFile('tests/verified-files/0049000004632-ean13.svg', $generated);
});

it('ean 13 generator throws exception when wrong check digit is given', function () {
    Barcode::imageType('svg')
        ->foregroundColor('black')
        ->height(30)
        ->widthFactor(2)
        ->type(Type::TYPE_EAN_13)
        ->generate('0049000004633');
})->throws(InvalidCheckDigitException::class);
