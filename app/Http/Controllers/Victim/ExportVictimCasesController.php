<?php

namespace App\Http\Controllers\Victim;

use App\Exports\ExportVictimCases;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
class ExportVictimCasesController extends Controller
{
    public function __invoke(string $type)
    {
        $organization  = auth()->user()->organization;
        return Excel::download(new ExportVictimCases($organization,$type), 'Vítimas.xlsx');
    }
}
