<?php

namespace App\Enums;

enum PeriodOfViolenceAct : string
{
    case MORNING = 'Manhã';
    case AFTERNOON = 'Tarde';
    case NIGHT = 'Noite';


    public static function getValues():array
    {
        return  [
            self::MORNING->value,
            self::AFTERNOON->value,
            self::NIGHT->value
        ];
    }
}
