<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\concerns\AuthorizeAdmins;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class UpdateOrganizationController extends Controller
{
    use AuthorizeAdmins;

    public function __invoke(Organization $organization, Request $request)
    {
        $this->authorizeAction();

        $validated = $request->validate([
            'name' => ['required','string'],
            'services' => ['required','string'],
        ]);

        $organization->update($validated);

        flash()->addSuccess('Organization updated successful.');
        return redirect()->back();
    }
}
