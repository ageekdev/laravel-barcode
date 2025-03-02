<?php

namespace AgeekDev\Barcode\Enums;

use AgeekDev\Barcode\Types\TypeCodabar;
use AgeekDev\Barcode\Types\TypeCode11;
use AgeekDev\Barcode\Types\TypeCode128;
use AgeekDev\Barcode\Types\TypeCode128A;
use AgeekDev\Barcode\Types\TypeCode128B;
use AgeekDev\Barcode\Types\TypeCode128C;
use AgeekDev\Barcode\Types\TypeCode32;
use AgeekDev\Barcode\Types\TypeCode39;
use AgeekDev\Barcode\Types\TypeCode39Checksum;
use AgeekDev\Barcode\Types\TypeCode39Extended;
use AgeekDev\Barcode\Types\TypeCode39ExtendedChecksum;
use AgeekDev\Barcode\Types\TypeCode93;
use AgeekDev\Barcode\Types\TypeEan13;
use AgeekDev\Barcode\Types\TypeEan8;
use AgeekDev\Barcode\Types\TypeIntelligentMailBarcode;
use AgeekDev\Barcode\Types\TypeInterface;
use AgeekDev\Barcode\Types\TypeInterleaved25;
use AgeekDev\Barcode\Types\TypeInterleaved25Checksum;
use AgeekDev\Barcode\Types\TypeKix;
use AgeekDev\Barcode\Types\TypeMsi;
use AgeekDev\Barcode\Types\TypeMsiChecksum;
use AgeekDev\Barcode\Types\TypePharmacode;
use AgeekDev\Barcode\Types\TypePharmacodeTwoCode;
use AgeekDev\Barcode\Types\TypePlanet;
use AgeekDev\Barcode\Types\TypePostnet;
use AgeekDev\Barcode\Types\TypeRms4cc;
use AgeekDev\Barcode\Types\TypeStandard2of5;
use AgeekDev\Barcode\Types\TypeStandard2of5Checksum;
use AgeekDev\Barcode\Types\TypeUpcA;
use AgeekDev\Barcode\Types\TypeUpcE;
use AgeekDev\Barcode\Types\TypeUpcExtension2;
use AgeekDev\Barcode\Types\TypeUpcExtension5;

enum Type: string
{
    case TYPE_CODE_32 = 'C32';

    case TYPE_CODE_39 = 'C39';

    case TYPE_CODE_39_CHECKSUM = 'C39+';

    case TYPE_CODE_39E = 'C39E'; // CODE 39 EXTENDED

    case TYPE_CODE_39E_CHECKSUM = 'C39E+'; // CODE 39 EXTENDED + CHECKSUM

    case TYPE_CODE_93 = 'C93';

    case TYPE_STANDARD_2_5 = 'S25';

    case TYPE_STANDARD_2_5_CHECKSUM = 'S25+';

    case TYPE_INTERLEAVED_2_5 = 'I25';

    case TYPE_INTERLEAVED_2_5_CHECKSUM = 'I25+';

    case TYPE_CODE_128 = 'C128';

    case TYPE_CODE_128_A = 'C128A';

    case TYPE_CODE_128_B = 'C128B';

    case TYPE_CODE_128_C = 'C128C';

    case TYPE_EAN_2 = 'EAN2'; // 2-Digits UPC-Based Extention

    case TYPE_EAN_5 = 'EAN5'; // 5-Digits UPC-Based Extention

    case TYPE_EAN_8 = 'EAN8';

    case TYPE_EAN_13 = 'EAN13';

    case TYPE_UPC_A = 'UPCA';

    case TYPE_UPC_E = 'UPCE';

    case TYPE_MSI = 'MSI'; // MSI (Variation of Plessey code)

    case TYPE_MSI_CHECKSUM = 'MSI+'; // MSI + CHECKSUM (modulo 11)

    case TYPE_POSTNET = 'POSTNET';

    case TYPE_PLANET = 'PLANET';

    case TYPE_RMS4CC = 'RMS4CC'; // RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)

    case TYPE_KIX = 'KIX'; // KIX (Klant index - Customer index)

    case TYPE_IMB = 'IMB'; // IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200

    case TYPE_CODABAR = 'CODABAR';

    case TYPE_CODE_11 = 'CODE11';

    case TYPE_PHARMA_CODE = 'PHARMA';

    case TYPE_PHARMA_CODE_TWO_TRACKS = 'PHARMA2T';

    public function class(): TypeInterface
    {
        return match ($this) {
            self::TYPE_CODE_32 => new TypeCode32,

            self::TYPE_CODE_39 => new TypeCode39,

            self::TYPE_CODE_39_CHECKSUM => new TypeCode39Checksum,

            self::TYPE_CODE_39E => new TypeCode39Extended,

            self::TYPE_CODE_39E_CHECKSUM => new TypeCode39ExtendedChecksum,

            self::TYPE_CODE_93 => new TypeCode93,

            self::TYPE_STANDARD_2_5 => new TypeStandard2of5,

            self::TYPE_STANDARD_2_5_CHECKSUM => new TypeStandard2of5Checksum,

            self::TYPE_INTERLEAVED_2_5 => new TypeInterleaved25,

            self::TYPE_INTERLEAVED_2_5_CHECKSUM => new TypeInterleaved25Checksum,

            self::TYPE_CODE_128 => new TypeCode128,

            self::TYPE_CODE_128_A => new TypeCode128A,

            self::TYPE_CODE_128_B => new TypeCode128B,

            self::TYPE_CODE_128_C => new TypeCode128C,

            self::TYPE_EAN_2 => new TypeUpcExtension2,

            self::TYPE_EAN_5 => new TypeUpcExtension5,

            self::TYPE_EAN_8 => new TypeEan8,

            self::TYPE_EAN_13 => new TypeEan13,

            self::TYPE_UPC_A => new TypeUpcA,

            self::TYPE_UPC_E => new TypeUpcE,

            self::TYPE_MSI => new TypeMsi,

            self::TYPE_MSI_CHECKSUM => new TypeMsiChecksum,

            self::TYPE_POSTNET => new TypePostnet,

            self::TYPE_PLANET => new TypePlanet,

            self::TYPE_RMS4CC => new TypeRms4cc,

            self::TYPE_KIX => new TypeKix,

            self::TYPE_IMB => new TypeIntelligentMailBarcode,

            self::TYPE_CODABAR => new TypeCodabar,

            self::TYPE_CODE_11 => new TypeCode11,

            self::TYPE_PHARMA_CODE => new TypePharmacode,

            self::TYPE_PHARMA_CODE_TWO_TRACKS => new TypePharmacodeTwoCode,
        };
    }
}
