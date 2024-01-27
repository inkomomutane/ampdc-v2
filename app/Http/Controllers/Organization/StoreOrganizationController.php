<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class StoreOrganizationController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'services' => ['required','string'],
        ]);
        $organization = Organization::create($validated);
        flash()->addSuccess('Organization created successful.');
        return redirect()->back();
    }
}
