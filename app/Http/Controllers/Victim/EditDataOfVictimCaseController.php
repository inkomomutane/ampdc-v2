<?php

namespace App\Http\Controllers\Victim;

use App\Data\PerpetratorData;
use App\Data\SupposedReasonOfViolenceData;
use App\Data\VictimCaseData;
use App\Data\ViolenceIncidentLocationData;
use App\Data\ViolenceTypeData;
use App\Models\Perpetrator;
use App\Models\SupposedReasonOfViolence;
use App\Models\VictimCase;
use App\Models\ViolenceIncidentLocation;
use App\Models\ViolenceType;
use Inertia\Inertia;

class EditDataOfVictimCaseController
{
    public function __invoke(VictimCase $case)
    {
        return Inertia::render('Victim/EditVictimCase', [
            'victimCase' => VictimCaseData::fromModel($case),
            'violenceTypes' => ViolenceTypeData::collection(ViolenceType::all()),
            'perpetrators' => PerpetratorData::collection(Perpetrator::all()),
            "supposedReasonsOfViolence" => SupposedReasonOfViolenceData::collection(SupposedReasonOfViolence::all()),
            'violenceIncidentLocations' => ViolenceIncidentLocationData::collection(ViolenceIncidentLocation::all()),
        ]);
    }
}
