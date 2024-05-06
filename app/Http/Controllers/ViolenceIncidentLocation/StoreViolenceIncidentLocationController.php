<?php

namespace App\Http\Controllers\ViolenceIncidentLocation;

use App\Http\Controllers\Controller;
use App\Models\ViolenceIncidentLocation;
use Illuminate\Http\Request;

class StoreViolenceIncidentLocationController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
        ]);
        $violenceIncidentLocation = ViolenceIncidentLocation::create($validated);
        flash()->addSuccess('Local de violência adicionado com sucesso.');
        return redirect()->back();
    }
}
