<?php

namespace App\Enums;

enum PeriodOfViolenceAct : string
{
    case MORNING = 'Manhã';
    case AFTERNOON = 'Tarde';
    case NIGHT = 'Noite';
    case DAWN = 'Madrugada';


    public static function getValues():array
    {
        return  [
            self::MORNING->value,
            self::AFTERNOON->value,
            self::NIGHT->value,
            self::DAWN->value
        ];
    }
}
