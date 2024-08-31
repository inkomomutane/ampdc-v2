<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\concerns\AuthorizeAdmins;
use App\Http\Controllers\Controller;
use App\Models\Organization;

class DeleteOrganizationController extends Controller
{
    use AuthorizeAdmins;



    public function __invoke(Organization $organization)
    {
        $this->authorizeAction();
        \DB::beginTransaction();
            $organization->delete();
        \DB::commit();
        flash()->addSuccess('Organization removed successful');
        return redirect()->back();
    }
}
