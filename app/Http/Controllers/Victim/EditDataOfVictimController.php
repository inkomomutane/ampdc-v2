<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimData;
use App\Http\Controllers\Controller;
use App\Models\Victim;
use Inertia\Inertia;

class EditDataOfVictimController extends  Controller
{
    public function __invoke(Victim $victim)
    {
        return Inertia::render('EditVictimData', [
            'victim' => VictimData::fromModel($victim),
        ]);
    }
}
