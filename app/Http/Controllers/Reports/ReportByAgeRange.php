<?php

namespace App\Http\Controllers\Reports;

use App\Enums\Gender;
use App\Models\VictimCase;

class ReportByAgeRange
{

    public static function handle(): array
    {
        $ranges = [
            [0, 17],
            [18, 35],
            [36, 50],
            [51, 200],
            [0, 200]
        ];

        $response = [];

        foreach ($ranges as $range) {
            $rangeLabel = static::getRangeLabel($range);
            foreach (Gender::getValues() as $gender) {
                $response[$rangeLabel][(string)$gender] = VictimCase::whereRelation('victim', 'age', '>=', $range[0])
                    ->whereRelation('victim', 'age', '<=', $range[1])
                    ->whereRelation('victim', 'gender', $gender)
                    ->count();
            }
        }
        return $response;
    }
    private static function getRangeLabel($range): string
    {
        if ($range[0] === 0 && $range[1] === 200) {
            return 'total';
        }

        if ($range[1] === 200) {
            return "$range[0]+";
        }

        return "$range[0] - $range[1]";
    }
}





