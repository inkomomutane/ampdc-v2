<?php

namespace App\Http\Controllers\ViolenceIncidentLocation;

use App\Data\ViolenceIncidentLocationData;
use App\Http\Controllers\Controller;
use App\Models\ViolenceIncidentLocation;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListViolenceIncidentLocationsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('ViolenceIncidentLocation/Index',[
            'violenceIncidentLocations' => $this->handle(
                term: request()->search
            )
        ]);
    }
    public function handle(?string $term= null){
       return  ViolenceIncidentLocationData::collection(ViolenceIncidentLocation::query()
            ->when($term, function (Builder $query) use ($term) {
                $query->whereAny(['name'],'like',"%$term%");
            })
            ->paginate(12)->withQueryString());
    }
}
