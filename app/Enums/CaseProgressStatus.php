<?php

namespace App\Enums;

enum CaseProgressStatus : string
{
    case REPORTED = 'Reportado';
    case FORWARDED = 'Encaminhado';
    case SOLVED = 'Resolvido';
    case CLOSED = 'Encerrado';
    case REOPENED = 'Reaberto';
    case REJECTED = 'Rejeitado';
    case PENDING = 'Pendente';
    case IN_PROGRESS = 'Em andamento';

    // get values
    public static function getValues(): array
    {
        return [
            self::REPORTED->value,
            self::FORWARDED->value,
            self::SOLVED->value,
            self::CLOSED->value,
            self::REOPENED->value,
            self::REJECTED->value,
            self::PENDING->value,
            self::IN_PROGRESS->value,
        ];
    }
}
