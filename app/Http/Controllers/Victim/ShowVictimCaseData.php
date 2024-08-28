<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCaseData;
use App\Data\VictimData;
use App\Models\Victim;
use App\Models\VictimCase;
use Inertia\Inertia;

class ShowVictimCaseData
{
    public function __invoke(Victim $victim)
    {
        return Inertia::render('Victim/ShowVictimData', [
            'victim' => VictimData::fromModel($victim),
            'cases' => VictimCaseData::collection($victim->cases),
        ]);
    }
}
