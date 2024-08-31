<?php

namespace App\Http\Controllers\User;
use App\Data\OrganizationData;
use App\Data\UserData;
use App\Http\Controllers\concerns\AuthorizeAdmins;
use App\Models\Organization;
use App\Models\User;
use Auth;
use Inertia\Inertia;

class GetUsers
{
    use AuthorizeAdmins;

    public function handle(?string $term = null)
    {
        return UserData::collection(
            User::query()
                ->when($term, function ($query, $search) {
                    $query->whereAny(['name','email','contact'], 'like', '%'.$search.'%');
                    $query->with('roles');
                })->with('roles')
                ->whereNot('id', Auth::user()->id)
                ->orderBy('created_at', 'desc')->paginate(5)->withQueryString()
        );
    }

    public function __invoke(): \Inertia\Response
    {
        return Inertia::render('User/Index', [
            'users' => $this->handle(request()->search),
            'organizations' => OrganizationData::collection(Organization::all())
        ]);
    }
}
