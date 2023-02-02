<?php

namespace AgeekDev\Barcode\Drivers;

use AgeekDev\Barcode\AbstractGenerator;
use AgeekDev\Barcode\BarcodeBar;

class SVG extends AbstractGenerator
{
    /**
     * Return SVG string representation of barcode.
     *
     * @param  string  $text code to print
     * @return string SVG code.
     */
    public function generate(string $text): string
    {
        $barcodeData = $this->getBarcodeData($text, $this->type);

        // replace table for special characters
        $repstr = ["\0" => '', '&' => '&amp;', '<' => '&lt;', '>' => '&gt;'];

        $width = round(($barcodeData->getWidth() * $this->widthFactor), 3);

        $svg = '<?xml version="1.0" standalone="no" ?>'.PHP_EOL;
        $svg .= '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'.PHP_EOL;
        $svg .= '<svg width="'.$width.'" height="'.$this->height.'" viewBox="0 0 '.$width.' '.$this->height.'" version="1.1" xmlns="http://www.w3.org/2000/svg">'.PHP_EOL;
        $svg .= "\t".'<desc>'.strtr($barcodeData->getBarcode(), $repstr).'</desc>'.PHP_EOL;
        $svg .= "\t".'<g id="bars" fill="'.$this->foregroundColor.'" stroke="none">'.PHP_EOL;

        // print bars
        $positionHorizontal = 0;
        /** @var BarcodeBar $bar */
        foreach ($barcodeData->getBars() as $bar) {
            $barWidth = round(($bar->getWidth() * $this->widthFactor), 3);
            $barHeight = round(($bar->getHeight() * $this->height / $barcodeData->getHeight()), 3);

            if ($bar->isBar() && $barWidth > 0) {
                $positionVertical = round(($bar->getPositionVertical() * $this->height / $barcodeData->getHeight()), 3);
                // draw a vertical bar
                $svg .= "\t\t".'<rect x="'.$positionHorizontal.'" y="'.$positionVertical.'" width="'.$barWidth.'" height="'.$barHeight.'" />'.PHP_EOL;
            }

            $positionHorizontal += $barWidth;
        }
        $svg .= "\t</g>".PHP_EOL;
        $svg .= '</svg>'.PHP_EOL;

        return $svg;
    }
}
