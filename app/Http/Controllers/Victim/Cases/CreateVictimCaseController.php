<?php

namespace App\Http\Controllers\Victim\Cases;

use App\Data\PerpetratorData;
use App\Data\SupposedReasonOfViolenceData;
use App\Data\VictimData;
use App\Data\ViolenceIncidentLocationData;
use App\Data\ViolenceTypeData;
use App\Models\Perpetrator;
use App\Models\SupposedReasonOfViolence;
use App\Models\Victim;
use App\Models\ViolenceIncidentLocation;
use App\Models\ViolenceType;
use Inertia\Inertia;

class CreateVictimCaseController
{
    public function __invoke(Victim $victim)
    {
        return Inertia::render('Victim/CreateVictimCase',[
            'victim' => VictimData::fromModel($victim),
            'violenceTypes' => ViolenceTypeData::collection(ViolenceType::all()),
            'perpetrators' => PerpetratorData::collection(Perpetrator::all()),
            "supposedReasonsOfViolence" => SupposedReasonOfViolenceData::collection(SupposedReasonOfViolence::all()),
            'violenceIncidentLocations' => ViolenceIncidentLocationData::collection(ViolenceIncidentLocation::all()),
        ]);
    }
}
