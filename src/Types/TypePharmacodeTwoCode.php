<?php

namespace AgeekDev\Barcode\Types;

/*
 * Pharmacode two-track
 * Contains digits (0 to 9)
 */

use AgeekDev\Barcode\Barcode;
use AgeekDev\Barcode\BarcodeBar;
use AgeekDev\Barcode\Exceptions\InvalidLengthException;

class TypePharmacodeTwoCode implements TypeInterface
{
    /**
     * @throws InvalidLengthException
     */
    public function getBarcodeData(string|float $code): Barcode
    {
        $code = (float) $code;

        if ($code < 1) {
            throw new InvalidLengthException('Pharmacode 2 needs a number of 1 or larger');
        }

        $seq = '';

        do {
            switch ($code % 3) {
                case 0:
                    $seq .= '3';
                    $code = ($code - 3) / 3.0;
                    break;

                case 1:
                    $seq .= '1';
                    $code = ($code - 1) / 3.0;
                    break;

                case 2:
                    $seq .= '2';
                    $code = ($code - 2) / 3.0;
                    break;
            }
        } while ($code != 0);

        $seq = strrev($seq);

        $barcode = new Barcode($code);

        $p = 0;
        $h = 1;

        for ($i = 0, $iMax = strlen($seq); $i < $iMax; $i++) {
            switch ($seq[$i]) {
                case '1':
                    $p = 1;
                    break;

                case '2':
                    $p = 0;
                    break;

                case '3':
                    $h = 2;
                    break;
            }

            $barcode->addBar(new BarcodeBar(1, $h, 1, $p));
            if ($i < (strlen($seq) - 1)) {
                $barcode->addBar(new BarcodeBar(1, 2, 0, 0));
            }
        }

        return $barcode;
    }
}
