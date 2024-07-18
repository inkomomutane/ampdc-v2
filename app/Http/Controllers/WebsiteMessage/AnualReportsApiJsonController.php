<?php

namespace App\Http\Controllers\WebsiteMessage;

use App\Http\Controllers\ReportsController;

class AnualReportsApiJsonController
{
    public function __invoke()
    {
        return response()->json([
            'labels' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            'values' => ReportsController::getCasesByYear(request('year')),
            'solvedValues' => ReportsController::getSolvedCasesByYear(request('year')),
        ]);
    }
}
