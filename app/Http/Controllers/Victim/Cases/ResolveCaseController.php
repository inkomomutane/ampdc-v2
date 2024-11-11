<?php

namespace App\Http\Controllers\Victim\Cases;

use App\Events\ResolveCaseEvent;
use App\Models\VictimCase;
use Exception;

class ResolveCaseController
{
    public function __invoke(VictimCase $case)
    {
        try {
            event(new ResolveCaseEvent($case->id));
            flash()->addSuccess('Caso de violência resolvido com sucesso.');
        } catch (Exception $e) {
            flash()->addError('Erro ao resolver caso de violência.');
        }
        return redirect()->back();
    }
}
