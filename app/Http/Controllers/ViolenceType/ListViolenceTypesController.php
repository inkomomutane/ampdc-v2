<?php

namespace App\Http\Controllers\ViolenceType;

use App\Data\ViolenceTypeData;
use App\Http\Controllers\Controller;
use App\Models\ViolenceType;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListViolenceTypesController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('ViolenceType/Index',[
            'violenceTypes' => $this->handle(
                term: request()->search
            )
        ]);
    }
    public function handle(?string $term= null){
       return  ViolenceTypeData::collection(ViolenceType::query()
            ->when($term, function (Builder $query) use ($term) {
                $query->whereAny(['name','description'],'like',"%$term%");
            })
            ->paginate(12)->withQueryString());
    }
}
