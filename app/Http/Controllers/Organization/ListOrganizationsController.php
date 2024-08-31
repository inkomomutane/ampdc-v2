<?php

namespace App\Http\Controllers\Organization;

use App\Data\OrganizationData;
use App\Http\Controllers\concerns\AuthorizeAdmins;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListOrganizationsController extends Controller
{
    use AuthorizeAdmins;

    public function __invoke()
    {
        $this->authorizeAction();

        return Inertia::render('Organization/Index',[
            'organizations' => $this->handle(
                term: request()->search
            )
        ]);
    }
    public function handle(?string $term= null){
       return  OrganizationData::collection(Organization::query()
            ->when($term, function (Builder $query) use ($term) {
                $query->whereAny(['name','services'],'like',"%$term%");
            })
            ->paginate(12)->withQueryString());
    }
}
