<?php

namespace AgeekDev\Barcode;

class Barcode
{
    protected string $barcode;

    protected int $width = 0;

    protected int $height = 0;

    protected array $bars = [];

    public function __construct(string $barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * Add bar.
     */
    public function addBar(BarcodeBar $bar): void
    {
        $this->bars[] = $bar;
        $this->width += $bar->getWidth();
        $this->height = max($this->height, $bar->getHeight());
    }

    /**
     * Get the barcode.
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * Get the width.
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Get the height.
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Get the bars.
     */
    public function getBars(): array
    {
        return $this->bars;
    }
}
