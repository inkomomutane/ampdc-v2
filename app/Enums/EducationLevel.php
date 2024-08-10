<?php

namespace App\Enums;

enum EducationLevel : string
{
    case PRIMARY = 'Ensino Primário';
    case SECONDARY = 'Ensino Secundário';
    case TECHNICAL_PROFESSIONAL = 'Ensino Técnico Profissional';
    case UNIVERSITY = 'Ensino Universitário';
    case POSTGRADUATE = 'Pós-Graduação';
    case MASTER = 'Mestrado';
    case DOCTORATE = 'Doutoramento';

    public static function getValues(): array
    {
        return [
            self::PRIMARY->value,
            self::SECONDARY->value,
            self::TECHNICAL_PROFESSIONAL->value,
            self::UNIVERSITY->value,
            self::POSTGRADUATE->value,
            self::MASTER->value,
            self::DOCTORATE->value,
        ];
    }
}
