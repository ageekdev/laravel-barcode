<?php

namespace AgeekDev\Barcode\Types;

use AgeekDev\Barcode\Barcode;
use AgeekDev\Barcode\BarcodeBar;
use AgeekDev\Barcode\Exceptions\InvalidCharacterException;
use AgeekDev\Barcode\Helpers\BarcodeHelper;

/*
 * Interleaved 2 of 5 barcodes.
 * Compact numeric code, widely used in industry, air cargo
 * Contains digits (0 to 9) and encodes the data in the width of both bars and spaces.
 */

class TypeInterleaved25Checksum implements TypeInterface
{
    /**
     * @throws InvalidCharacterException
     */
    public function getBarcodeData(string $code): Barcode
    {
        $chr['0'] = '11221';
        $chr['1'] = '21112';
        $chr['2'] = '12112';
        $chr['3'] = '22111';
        $chr['4'] = '11212';
        $chr['5'] = '21211';
        $chr['6'] = '12211';
        $chr['7'] = '11122';
        $chr['8'] = '21121';
        $chr['9'] = '12121';
        $chr['A'] = '11';
        $chr['Z'] = '21';

        // add checksum
        $code .= $this->getChecksum($code);

        if ((strlen($code) % 2) != 0) {
            // add leading zero if code-length is odd
            $code = '0'.$code;
        }
        // add start and stop codes
        $code = 'AA'.strtolower($code).'ZA';

        $barcode = new Barcode($code);
        for ($i = 0, $iMax = strlen($code); $i < $iMax; $i = ($i + 2)) {
            $char_bar = $code[$i];
            $char_space = $code[$i + 1];
            if (! isset($chr[$char_bar], $chr[$char_space])) {
                throw new InvalidCharacterException();
            }

            // create a bar-space sequence
            $seq = '';
            $chrlen = strlen($chr[$char_bar]);
            for ($s = 0; $s < $chrlen; $s++) {
                $seq .= $chr[$char_bar][$s].$chr[$char_space][$s];
            }

            for ($j = 0, $jMax = strlen($seq); $j < $jMax; $j++) {
                if (($j % 2) === 0) {
                    $t = true; // bar
                } else {
                    $t = false; // space
                }
                $w = $seq[$j];
                $barcode->addBar(new BarcodeBar($w, 1, $t));
            }
        }

        return $barcode;
    }

    protected function getChecksum(string $code): string
    {
        return (string) BarcodeHelper::getChecksum($code);
    }
}
