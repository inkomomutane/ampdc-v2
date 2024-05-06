<?php

namespace App\Enums;

enum CivilState :string
{
    case SINGLE = 'solteiro';
    case MARRIED = 'casado';
    case DIVORCED = 'divorciado';
    case WIDOWER = 'viúvo';


    public static function getValues(): array
    {
        return [
            self::SINGLE->value,
            self::MARRIED->value,
            self::DIVORCED->value,
            self::WIDOWER->value,
        ];
    }
}
