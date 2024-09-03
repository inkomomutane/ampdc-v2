<?php

namespace App\Http\Controllers\Reports;

use App\Enums\PeriodOfViolenceAct;
use App\Models\VictimCase;

class GetReportByPeriodOfAct
{


    public function __invoke()
    {
        return response()->json(static::handle());
    }

    public static function handle(): array
    {
        $labels = PeriodOfViolenceAct::getValues();
        $count = VictimCase::count();

        $values = [];

        foreach (PeriodOfViolenceAct::getValues() as $period) {
            $sum = VictimCase::where('period_of_violence_act', $period)->count();
            $values[] = round(($sum / $count) * 100, 2);
        }

        return [
            'labels' => $labels,
            'values' => $values
        ];
    }
}
