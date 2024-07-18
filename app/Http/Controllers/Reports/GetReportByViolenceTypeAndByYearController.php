<?php

namespace App\Http\Controllers\Reports;

use App\Enums\CaseProgressStatus;
use App\Http\Controllers\ReportsController;
use App\Models\VictimCase;
use App\Models\ViolenceType;

class GetReportByViolenceTypeAndByYearController
{

    public function __invoke()
    {
        return response()->json([
            'labels' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            'values'=> static::handle(request('year') ?? now()->year)]);
    }

    public static function handle(?int $year): array
    {
        $year = $year ?? now()->year;
         $violenceTypeObjects = [];
        foreach (ViolenceType::all() as $violenceType) {
            $violenceTypeObjects[] = [
                'name' => $violenceType->name,
                'type' => 'column',
                'data' => static::getCasesByYear($year, $violenceType->id)
            ];
        }
        $violenceTypeObjects[] = (object) [
            'name' => 'Total',
             'type' => 'line',
            'data' => ReportsController::getCasesByYear($year)
        ];
        return $violenceTypeObjects;
    }

    public static function getCasesByYear(?int $year, string $violenceTypeId) : array
    {
        $year = $year ?? now()->year;
        $monthCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthCounts[] = VictimCase::whereYear('created_at',$year)
                ->whereMonth('created_at',$i)
                ->whereViolenceTypeId($violenceTypeId)
                ->count();
        }
        return $monthCounts;
    }
}
