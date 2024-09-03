<?php

namespace App\Http\Controllers\Reports;

use App\Models\VictimCase;
use App\Models\ViolenceIncidentLocation;

class GetReportByViolenceLocation
{


    public function __invoke()
    {
        return response()->json(static::handle());
    }


    public static function handle(): array {
        $labels = ViolenceIncidentLocation::get()->pluck('name')->toArray();
        $count = VictimCase::count();

        $values = [];

        foreach (ViolenceIncidentLocation::all() as $location) {
            $sum = VictimCase::where('violence_incident_location_id', $location->id)->count();
            $values[] = round(($sum / $count) * 100, 2);
        }

        return [
            'labels' => $labels,
            'values' => $values
        ];
    }

}
