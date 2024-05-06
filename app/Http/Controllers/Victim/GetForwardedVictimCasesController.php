<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCaseData;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\VictimCase;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class GetForwardedVictimCasesController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Victim/GetVictimCases',[
            'cases' => $this->handle(
                organization: auth()->user()->organization,
                term: request()->search
            )
        ]);
    }

    public function handle(Organization $organization, ?string $term= null){
        return  VictimCaseData::collection(
            VictimCase::query()
                ->when($term, function (Builder $query) use ($term) {
                    $query->whereAny(['progress_status','violence_details','case_code'],'like',"%$term%");
                })
                ->orWhereRelation('victim',function(Builder $query) use ($term){
                    $query->whereAny(['name','age','contact'],'like',"%$term%");
                })
                ->whereForwardedFromOrganizationId($organization->id)
                ->paginate(12)->withQueryString());
    }
}
