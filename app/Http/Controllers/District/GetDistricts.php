<?php

namespace  App\Http\Controllers\District;

use App\Data\DistrictData;
use App\Data\ProvinceData;
use App\Models\District;
use App\Models\Province;
use Inertia\Inertia;

class GetDistricts
{
    public function handle(?string $term = null)
    {
        return DistrictData::collection(
            District::query()
                ->when($term, function ($query, $search) {
                    $query->where('name', 'like', '%'.$search.'%');
                    $query->with('province');
                })->with('province')->
            orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('District/Index', [
            'districts' => $this->handle(request()->search),
            'provinces' => ProvinceData::collection(Province::all()),
        ]);
    }
}
