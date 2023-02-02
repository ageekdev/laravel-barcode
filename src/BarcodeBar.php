<?php

namespace AgeekDev\Barcode;

class BarcodeBar
{
    protected int $width;

    protected int $height;

    protected int $positionVertical;

    protected int $type;

    public const TYPE_BAR = 1;

    public const TYPE_SPACING = 0;

    public function __construct(int $width, int $height, bool $drawBar = true, int $positionVertical = 0)
    {
        $this->width = $width;
        $this->height = $height;
        $this->positionVertical = $positionVertical;
        $this->type = $drawBar ? self::TYPE_BAR : self::TYPE_SPACING;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getPositionVertical(): int
    {
        return $this->positionVertical;
    }

    public function isBar(): bool
    {
        return $this->type === self::TYPE_BAR;
    }
}
