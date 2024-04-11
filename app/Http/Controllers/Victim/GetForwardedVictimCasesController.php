<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCasesHistoryData;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\VictimCasesHistory;
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
        return  VictimCasesHistoryData::collection(
            VictimCasesHistory::query()
                ->when($term, function (Builder $query) use ($term) {
                    $query->whereAny(['progress_status','case_details'],'like',"%${term}%");
                })
                ->orWhereRelation('victim',function(Builder $query) use ($term){
                    $query->whereAny(['name','age','contact','violence_details'],'like',"%${term}%");
                })
                ->forwardedCases($organization)
                ->paginate(12)->withQueryString());
    }
}
