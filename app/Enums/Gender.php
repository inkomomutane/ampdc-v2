<?php

namespace App\Enums;

enum Gender : string
{
    case FEMALE = 'Feminino';
    case MALE = 'Masculino';

    public static function getValues(): array
    {
        return  [
            self::MALE->value,
            self::FEMALE->value,
        ];
    }
}
