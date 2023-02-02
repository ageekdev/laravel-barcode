<?php

namespace AgeekDev\Barcode\Helpers;

use AgeekDev\Barcode\Barcode;
use AgeekDev\Barcode\BarcodeBar;

/**
 * Convert binary barcode sequence string to Barcode representation.
 */
class BinarySequenceConverter
{
    public static function convert(string $code, string $sequence): Barcode
    {
        $barcode = new Barcode($code);

        return self::generate($sequence, $barcode);
    }

    /**
     * @param  string  $sequence
     * @param  Barcode  $barcode
     * @return Barcode
     */
    public static function generate(string $sequence, Barcode $barcode): Barcode
    {
        $len = strlen($sequence);
        $barWidth = 0;
        for ($i = 0; $i < $len; $i++) {
            $barWidth++;
            if (($i === ($len - 1)) || (($i < ($len - 1)) && ($sequence[$i] !== $sequence[($i + 1)]))) {
                if ($sequence[$i] === '1') {
                    $drawBar = true;
                } else {
                    $drawBar = false;
                }

                $barcode->addBar(new BarcodeBar($barWidth, 1, $drawBar));
                $barWidth = 0;
            }
        }

        return $barcode;
    }
}
