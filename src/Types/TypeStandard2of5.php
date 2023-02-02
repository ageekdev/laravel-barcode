<?php

namespace AgeekDev\Barcode\Types;

use AgeekDev\Barcode\Barcode;
use AgeekDev\Barcode\Exceptions\InvalidCharacterException;
use AgeekDev\Barcode\Helpers\BarcodeHelper;
use AgeekDev\Barcode\Helpers\BinarySequenceConverter;

/*
 * Standard 2 of 5 barcodes.
 * Used in airline ticket marking, photofinishing
 * Contains digits (0 to 9) and encodes the data only in the width of bars.
 */

class TypeStandard2of5 implements TypeInterface
{
    protected bool $checksum = false;

    /**
     * @throws InvalidCharacterException
     */
    public function getBarcodeData(string $code): Barcode
    {
        $chr['0'] = '10101110111010';
        $chr['1'] = '11101010101110';
        $chr['2'] = '10111010101110';
        $chr['3'] = '11101110101010';
        $chr['4'] = '10101110101110';
        $chr['5'] = '11101011101010';
        $chr['6'] = '10111011101010';
        $chr['7'] = '10101011101110';
        $chr['8'] = '11101010111010';
        $chr['9'] = '10111010111010';
        if ($this->checksum) {
            // add checksum
            $code .= $this->checksum_s25($code);
        }
        $seq = '11011010';

        for ($i = 0, $iMax = strlen($code); $i < $iMax; $i++) {
            $digit = $code[$i];
            if (! isset($chr[$digit])) {
                throw new InvalidCharacterException('Char '.$digit.' is unsupported');
            }
            $seq .= $chr[$digit];
        }
        $seq .= '1101011';

        return BinarySequenceConverter::convert($code, $seq);
    }

    /**
     * Checksum for standard 2 of 5 barcodes.
     *
     * @param $code (string) code to process.
     * @return int checksum.
     *
     * @protected
     */
    protected function checksum_s25(string $code): int
    {
        return BarcodeHelper::getChecksum($code);
    }
}
