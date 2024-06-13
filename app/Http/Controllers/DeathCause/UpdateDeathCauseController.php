<?php

namespace App\Http\Controllers\DeathCause;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\DeathCause;
use Illuminate\Http\Request;

class UpdateDeathCauseController extends Controller
{
    public function __invoke(DeathCause $deathCause, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'description' => ['nullable','string'],
        ]);

        $deathCause->update($validated);

        flash()->addSuccess('Causas de Óbito actualizada com sucesso.');
        return redirect()->back();
    }
}
