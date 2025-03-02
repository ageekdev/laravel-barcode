<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Barcode Image Type
    |--------------------------------------------------------------------------
    |
    | This option controls the default barcode generator that will be used
    | to generate barcode. Alternative barcode generators may be setup and used as
    | needed; however, this generator will be used by default.
    |
    | Supported: "dynamic_html", "html", "jpg", "png", "svg"
    |
    */
    'image_type' => env('BARCODE_DRIVER', 'png'),

    /*
    |----------------------------------------------------------------------------------------------
    | Accepted Barcode Types
    |----------------------------------------------------------------------------------------------
    | Supported: TYPE_CODE_32, TYPE_CODE_39, TYPE_CODE_39_CHECKSUM, TYPE_CODE_39E,
    | TYPE_CODE_39E_CHECKSUM, TYPE_CODE_93, TYPE_STANDARD_2_5, TYPE_STANDARD_2_5_CHECKSUM,
    | TYPE_INTERLEAVED_2_5, TYPE_INTERLEAVED_2_5_CHECKSUM, TYPE_CODE_128, TYPE_CODE_128_A,
    | TYPE_CODE_128_B, TYPE_CODE_128_C, TYPE_EAN_2, TYPE_EAN_5, TYPE_EAN_8, TYPE_EAN_13,
    | TYPE_UPC_A, TYPE_UPC_E, TYPE_MSI, TYPE_MSI_CHECKSUM, TYPE_POSTNET, TYPE_PLANET, TYPE_RMS4CC,
    | TYPE_KIX, TYPE_IMB, TYPE_CODABAR, TYPE_CODE_11, TYPE_PHARMA_CODE, TYPE_PHARMA_CODE_TWO_TRACKS
    |
    */
    'type' => \AgeekDev\Barcode\Enums\BarcodeType::CODE_128,

    /*
     * Foreground color of the barcode
     */
    'foreground_color' => '#000000',

    /*
     * width factor of barcode
     */
    'width_factor' => 2,

    /*
     * Height of image barcode
     */
    'height' => 30,

];
