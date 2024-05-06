<?php

namespace App\Http\Controllers\Perpetrator;

use App\Data\PerpetratorData;
use App\Http\Controllers\Controller;
use App\Models\Perpetrator;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListPerpetratorsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Perpetrator/Index',[
            'perpetrators' => $this->handle(
                term: request()->search
            )
        ]);
    }
    public function handle(?string $term= null){
       return  PerpetratorData::collection(Perpetrator::query()
            ->when($term, function (Builder $query) use ($term) {
                $query->whereAny(['name'],'like',"%$term%");
            })
            ->paginate(12)->withQueryString());
    }
}
