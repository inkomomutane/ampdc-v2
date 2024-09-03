<?php

namespace App\Http\Controllers\Reports;

use App\Models\SupposedReasonOfViolence;
use App\Models\VictimCase;

class GetReportByViolenceReason
{

    public function __invoke()
    {
        return response()->json(static::handle());
    }

    public static function handle(): array
    {
       $labels = SupposedReasonOfViolence::get()->pluck('name')->toArray();
        $count = VictimCase::count();

        $values = [];

        foreach (SupposedReasonOfViolence::all() as $reason) {
            $sum = VictimCase::where('supposed_reason_of_violence_id', $reason->id)->count();
            $values[] = round(($sum / $count) * 100, 2);
        }

        return [
            'labels' => $labels,
            'values' => $values
        ];
    }
}
