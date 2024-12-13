<?php

namespace App\Enums;

enum Gender : string
{
    case FEMALE = 'Feminino';
    case LGBTQ_OTHER = 'LGBTQ+/Outro';

    public static function getValues(): array
    {
        return  [
             self::FEMALE->value,
            self::LGBTQ_OTHER->value
        ];
    }
}
