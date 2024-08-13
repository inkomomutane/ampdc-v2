<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCaseData;
use App\Models\VictimCase;
use Inertia\Inertia;

class ShowVictimCaseData
{
    public function __invoke(VictimCase $case)
    {
        return Inertia::render('Victim/ShowVictimCase', [
            'victimCase' => VictimCaseData::fromModel($case),
        ]);
    }
}
