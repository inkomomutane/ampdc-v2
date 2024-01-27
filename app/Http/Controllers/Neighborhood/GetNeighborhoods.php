<?php

namespace App\Http\Controllers\Neighborhood;

use App\Data\BairroData;
use App\Data\CityData;
use App\Data\DistrictData;
use App\Data\NeighborhoodData;
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\District;
use App\Models\Neighborhood;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetNeighborhoods
{

    public function handle(?string $term = null)
    {

        $neighborhoods = Neighborhood::query()
            ->when($term, function ($query, $search) {
                $query->where('name', 'like', '%'.$search.'%');
                $query->with('district');
            })->with('district')->
       orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        return NeighborhoodData::collection(
            $neighborhoods
        );
    }

    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('Neighborhood/Index', [
            'neighborhoods' => $this->handle(request()->search),
            'districts' => DistrictData::collection(District::all()),
        ]);
    }
}
