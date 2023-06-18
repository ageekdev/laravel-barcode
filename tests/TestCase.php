<?php

namespace AgeekDev\Barcode\Tests;

use AgeekDev\Barcode\BarcodeServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            BarcodeServiceProvider::class,
        ];
    }
}
