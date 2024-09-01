<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimData;
use App\Http\Controllers\Controller;
use App\Models\Victim;
use App\Models\VictimCase;
use Inertia\Inertia;
use App\Data\VictimCaseShortDto;

class EditDataOfVictimController extends  Controller
{
    public function __invoke(Victim $victim)
    {
        return Inertia::render('EditVictimData', [
            'victim' => VictimData::fromModel($victim),
            'cases' => VictimCaseShortDto::collection(VictimCase::select(['id','case_code','is_violence_caused_death','is_terminated'])->whereVictimId($victim->id)->get()),
        ]);
    }
}
