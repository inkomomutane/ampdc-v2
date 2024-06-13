<?php

namespace App\Http\Controllers\DeathCause;

use App\Data\DeathCauseData;
use App\Http\Controllers\Controller;
use App\Models\DeathCause;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListDeathCausesController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('DeathCause/Index',[
            'deathCauses' => $this->handle(
                term: request()->search
            )
        ]);
    }
    public function handle(?string $term= null){
       return  DeathCauseData::collection(DeathCause::query()
            ->when($term, function (Builder $query) use ($term) {
                $query->whereAny(['name','description'],'like',"%$term%");
            })
            ->paginate(12)->withQueryString());
    }
}
