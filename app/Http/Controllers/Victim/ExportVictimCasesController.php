<?php

namespace App\Http\Controllers\Victim;

use App\Exports\ExportVictimCases;

class ExportVictimCasesController
{
    public function __invoke()
    {
        return \Excel::download(new ExportVictimCases(auth()->user()->organization), 'Casos-de-violência.xlsx');
    }
}
