<?php

namespace AgeekDev\Barcode\Types;

use AgeekDev\Barcode\Barcode;
use AgeekDev\Barcode\Helpers\BinarySequenceConverter;

/*
 * Pharmacode
 * Contains digits (0 to 9)
 */

class TypePharmacode implements TypeInterface
{
    public function getBarcodeData(string|int $code): Barcode
    {
        $code = (int) $code;

        $seq = '';
        while ($code > 0) {
            if (($code % 2) === 0) {
                $seq .= '11100';
                $code -= 2;
            } else {
                $seq .= '100';
                $code--;
            }
            $code /= 2;
        }

        $seq = substr($seq, 0, -2);
        $seq = strrev($seq);

        return BinarySequenceConverter::convert($code, $seq);
    }
}
