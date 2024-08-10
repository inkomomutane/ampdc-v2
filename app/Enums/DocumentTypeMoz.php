<?php

namespace App\Enums;

enum DocumentTypeMoz : string
{
    case BI = 'BI';
    case NUIT = 'NUIT';
    case PASSPORT = 'Passaporte';
    case BIRTH_CERTIFICATE = 'Certidão de Nascimento';
    case DRIVING_LICENSE = 'Carta de Condução';
    case DIRE = 'DIRE';
    case OTHER = 'Outro';

    public static function toValues(): array
    {
        return collect(self::cases())->map(fn($case) => $case->value)->toArray();
    }
}
