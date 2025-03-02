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

enum BarcodeType: string
{
    case CODE_32 = 'C32';

    case CODE_39 = 'C39';

    case CODE_39_CHECKSUM = 'C39+';

    case CODE_39E = 'C39E'; // CODE 39 EXTENDED

    case CODE_39E_CHECKSUM = 'C39E+'; // CODE 39 EXTENDED + CHECKSUM

    case CODE_93 = 'C93';

    case STANDARD_2_5 = 'S25';

    case STANDARD_2_5_CHECKSUM = 'S25+';

    case INTERLEAVED_2_5 = 'I25';

    case INTERLEAVED_2_5_CHECKSUM = 'I25+';

    case CODE_128 = 'C128';

    case CODE_128_A = 'C128A';

    case CODE_128_B = 'C128B';

    case CODE_128_C = 'C128C';

    case EAN_2 = 'EAN2'; // 2-Digits UPC-Based Extention

    case EAN_5 = 'EAN5'; // 5-Digits UPC-Based Extention

    case EAN_8 = 'EAN8';

    case EAN_13 = 'EAN13';

    case UPC_A = 'UPCA';

    case UPC_E = 'UPCE';

    case MSI = 'MSI'; // MSI (Variation of Plessey code)

    case MSI_CHECKSUM = 'MSI+'; // MSI + CHECKSUM (modulo 11)

    case POSTNET = 'POSTNET';

    case PLANET = 'PLANET';

    case RMS4CC = 'RMS4CC'; // RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)

    case KIX = 'KIX'; // KIX (Klant index - Customer index)

    case IMB = 'IMB'; // IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200

    case CODABAR = 'CODABAR';

    case CODE_11 = 'CODE11';

    case PHARMA_CODE = 'PHARMA';

    case PHARMA_CODE_TWO_TRACKS = 'PHARMA2T';

    public function class(): TypeInterface
    {
        return match ($this) {
            self::CODE_32 => new TypeCode32,

            self::CODE_39 => new TypeCode39,

            self::CODE_39_CHECKSUM => new TypeCode39Checksum,

            self::CODE_39E => new TypeCode39Extended,

            self::CODE_39E_CHECKSUM => new TypeCode39ExtendedChecksum,

            self::CODE_93 => new TypeCode93,

            self::STANDARD_2_5 => new TypeStandard2of5,

            self::STANDARD_2_5_CHECKSUM => new TypeStandard2of5Checksum,

            self::INTERLEAVED_2_5 => new TypeInterleaved25,

            self::INTERLEAVED_2_5_CHECKSUM => new TypeInterleaved25Checksum,

            self::CODE_128 => new TypeCode128,

            self::CODE_128_A => new TypeCode128A,

            self::CODE_128_B => new TypeCode128B,

            self::CODE_128_C => new TypeCode128C,

            self::EAN_2 => new TypeUpcExtension2,

            self::EAN_5 => new TypeUpcExtension5,

            self::EAN_8 => new TypeEan8,

            self::EAN_13 => new TypeEan13,

            self::UPC_A => new TypeUpcA,

            self::UPC_E => new TypeUpcE,

            self::MSI => new TypeMsi,

            self::MSI_CHECKSUM => new TypeMsiChecksum,

            self::POSTNET => new TypePostnet,

            self::PLANET => new TypePlanet,

            self::RMS4CC => new TypeRms4cc,

            self::KIX => new TypeKix,

            self::IMB => new TypeIntelligentMailBarcode,

            self::CODABAR => new TypeCodabar,

            self::CODE_11 => new TypeCode11,

            self::PHARMA_CODE => new TypePharmacode,

            self::PHARMA_CODE_TWO_TRACKS => new TypePharmacodeTwoCode,
        };
    }
}
