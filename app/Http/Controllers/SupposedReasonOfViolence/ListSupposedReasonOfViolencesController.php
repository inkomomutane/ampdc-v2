<?php

namespace App\Http\Controllers\SupposedReasonOfViolence;

use App\Data\SupposedReasonOfViolenceData;
use App\Http\Controllers\Controller;
use App\Models\SupposedReasonOfViolence;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListSupposedReasonOfViolencesController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('SupposedReasonOfViolence/Index',[
            'supposedReasonOfViolences' => $this->handle(
                term: request()->search
            )
        ]);
    }
    public function handle(?string $term= null){
       return  SupposedReasonOfViolenceData::collection(SupposedReasonOfViolence::query()
            ->when($term, function (Builder $query) use ($term) {
                $query->whereAny(['name'],'like',"%$term%");
            })
            ->paginate(12)->withQueryString());
    }
}
