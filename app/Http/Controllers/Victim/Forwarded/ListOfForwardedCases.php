<?php

namespace App\Http\Controllers\Victim\Forwarded;

use App\Data\ForwardedCaseData;
use App\Models\ForwardingCase;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Spatie\LaravelData\CursorPaginatedDataCollection;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;

class ListOfForwardedCases
{
    public function __invoke()
    {
        return  Inertia::render('Victim/Forwarded/VictimCases',[
            'cases' => static::handle(\Auth::user()->organization,request()->search)
        ]);
    }


    public static function handle(Organization $organization,?string $term = '') : PaginatedDataCollection|CursorPaginatedDataCollection|DataCollection
    {
       return ForwardedCaseData::collection(
           ForwardingCase::with(['case.victim','forwardedTo','organization'])
            ->when($term, function (Builder $query) use ($term,$organization) {
                $query->where(function ($query) use ($term) {
                    $query->where('case_details', 'like', '%' . $term . '%')
                        ->orWhere('status', 'like', '%' . $term . '%')
                        ->orWhere('case_updates', 'like', '%' . $term . '%')
                        ->orWhere('conclusion', 'like', '%' . $term . '%')
                        ->orWhereRelation('case', 'case_code', 'like', '%' . $term . '%')
                        ->orWhereRelation('case.victim', 'name', 'like', '%' . $term . '%')
                        ->orWhereRelation('case.victim', 'age', 'like', '%' . $term . '%');
                })->where('organization_id', $organization->id);
            })->whereOrganizationId($organization->id)->paginate(5)->withQueryString()
       );
    }
}
