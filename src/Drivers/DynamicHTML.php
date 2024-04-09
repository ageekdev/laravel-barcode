<?php

namespace AgeekDev\Barcode\Drivers;

use AgeekDev\Barcode\AbstractGenerator;
use AgeekDev\Barcode\BarcodeBar;

class DynamicHTML extends AbstractGenerator
{
    private const WIDTH_PRECISION = 6;

    /**
     * Return an HTML representation of barcode.
     * This 'dynamic' version uses percentage based widths and heights, resulting in a vector-y qualitative result.
     *
     * @param  string  $text  code to print
     */
    public function generate(string $text): string
    {
        $barcodeData = $this->getBarcodeData($text, $this->type);

        $html = '<div style="font-size:0;position:relative;width:100%;height:100%">'.PHP_EOL;

        $positionHorizontal = 0;
        /** @var BarcodeBar $bar */
        foreach ($barcodeData->getBars() as $bar) {
            $barWidth = $bar->getWidth() / $barcodeData->getWidth() * 100;
            $barHeight = round(($bar->getHeight() / $barcodeData->getHeight() * 100), 3);

            if ($barWidth > 0 && $bar->isBar()) {
                $positionVertical = round(($bar->getPositionVertical() / $barcodeData->getHeight() * 100), 3);

                // draw a vertical bar
                $html .= '<div style="background-color:'.$this->foregroundColor.';width:'.round($barWidth, self::WIDTH_PRECISION).'%;height:'.$barHeight.'%;position:absolute;left:'.round($positionHorizontal, self::WIDTH_PRECISION).'%;top:'.$positionVertical.(($positionVertical > 0) ? '%' : '').'">&nbsp;</div>'.PHP_EOL;
            }

            $positionHorizontal += $barWidth;
        }

        $html .= '</div>'.PHP_EOL;

        return $html;
    }
}
