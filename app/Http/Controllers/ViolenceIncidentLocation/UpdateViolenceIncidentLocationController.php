<?php

namespace App\Http\Controllers\ViolenceIncidentLocation;

use App\Http\Controllers\Controller;
use App\Models\ViolenceIncidentLocation;
use Illuminate\Http\Request;

class UpdateViolenceIncidentLocationController extends Controller
{
    public function __invoke(ViolenceIncidentLocation $violenceIncidentLocation, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
        ]);
        $violenceIncidentLocation->update($validated);
        flash()->addSuccess('Local de violência actualizado com sucesso.');
        return redirect()->back();
    }
}
