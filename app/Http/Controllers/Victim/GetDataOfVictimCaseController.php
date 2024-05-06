<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCaseData;
use App\Http\Controllers\Controller;
use App\Models\VictimCase;
use Inertia\Inertia;

class GetDataOfVictimCaseController extends  Controller
{
    public function __invoke(VictimCase $case)
    {
        return Inertia::render('Victim/ViewCase',[
            'victimCase' => VictimCaseData::fromModel($case),
            'organizations' => \App\Data\OrganizationData::collection(\App\Models\Organization::all()),
            'violenceTypes' => \App\Data\ViolenceTypeData::collection(\App\Models\ViolenceType::all()),
            'neighborhoods' => \App\Data\NeighborhoodData::collection(\App\Models\Neighborhood::all()),
            'caseOnOtherOrganizations' => VictimCaseData::collection(
                VictimCase::query()
                    ->with(['victim.neighborhood'])
                    ->where('victim_id',$case->victim_id)
                    ->whereCaseCode($case->case_code)
                    ->where('id','!=',$case->id)
                    ->get()
            )
        ]);
    }
}
