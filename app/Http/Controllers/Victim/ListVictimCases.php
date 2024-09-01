<?php

namespace App\Http\Controllers\Victim;

use App\Data\VictimCaseData;
use App\Models\VictimCase;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListVictimCases
{
    public function __invoke()
    {
        return Inertia::render('Victim/ListVictimCases',[
            'cases' => static::handle(request('search'))
        ]);
    }

    public static function handle($search = "")
    {
        return VictimCaseData::collection(VictimCase::when($search, function ($query, $search) {
                 $query->whereAny(['perpetrator_name','case_code'],'like','%'.$search.'%')
                    ->orWhereHas('victim', function (Builder $query) use ($search) {
                        $query->whereAny(['name','address','contact'], 'like', '%'.$search.'%');
                    });
            })->paginate(5)->withQueryString());
    }
}
