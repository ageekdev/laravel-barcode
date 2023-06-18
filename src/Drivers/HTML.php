<?php

namespace AgeekDev\Barcode\Drivers;

use AgeekDev\Barcode\AbstractGenerator;
use AgeekDev\Barcode\BarcodeBar;

class HTML extends AbstractGenerator
{
    /**
     * Return an HTML representation of barcode.
     * This original version uses pixel based widths and heights. Use Dynamic HTML version for better quality representation.
     */
    public function generate(string $text): string
    {
        $barcodeData = $this->getBarcodeData($text, $this->type);

        $html = '<div style="font-size:0;position:relative;width:'.($barcodeData->getWidth() * $this->widthFactor).'px;height:'.($this->height).'px;">'.PHP_EOL;

        $positionHorizontal = 0;
        /** @var BarcodeBar $bar */
        foreach ($barcodeData->getBars() as $bar) {
            $barWidth = round(($bar->getWidth() * $this->widthFactor), 3);
            $barHeight = round(($bar->getHeight() * $this->height / $barcodeData->getHeight()), 3);

            if ($barWidth > 0 && $bar->isBar()) {
                $positionVertical = round(($bar->getPositionVertical() * $this->height / $barcodeData->getHeight()), 3);

                $html .= '<div style="background-color:'.$this->foregroundColor.';width:'.$barWidth.'px;height:'.$barHeight.'px;position:absolute;left:'.$positionHorizontal.'px;top:'.$positionVertical.(($positionVertical > 0) ? 'px' : '').'">&nbsp;</div>'.PHP_EOL;
            }

            $positionHorizontal += $barWidth;
        }

        $html .= '</div>'.PHP_EOL;

        return $html;
    }
}
