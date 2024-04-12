<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCasesHistoryData;
use App\Http\Controllers\Controller;
use App\Models\VictimCasesHistory;
use Inertia\Inertia;

class GetDataOfVictimCaseController extends  Controller
{
    public function __invoke(VictimCasesHistory $case)
    {
        return Inertia::render('Victim/ViewCase',[
            'victimCase' => VictimCasesHistoryData::fromModel($case),
            'organizations' => \App\Data\OrganizationData::collection(\App\Models\Organization::all()),
            'violenceTypes' => \App\Data\ViolenceTypeData::collection(\App\Models\ViolenceType::all()),
            'neighborhoods' => \App\Data\NeighborhoodData::collection(\App\Models\Neighborhood::all()),
            'caseOnOtherOrganizations' => VictimCasesHistoryData::collection(
                VictimCasesHistory::query()
                    ->with(['victim.neighborhood','victim.neighborhood'])
                    ->where('victim_id',$case->victim_id)
                    ->whereCaseCode($case->case_code)
                    ->where('id','!=',$case->id)
                    ->get()
            )
        ]);
    }
}
