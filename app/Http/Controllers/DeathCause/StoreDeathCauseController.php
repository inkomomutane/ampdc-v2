<?php

namespace App\Http\Controllers\DeathCause;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\DeathCause;
use Illuminate\Http\Request;

class StoreDeathCauseController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'description' => ['nullable','string'],
        ]);
        $deathCause = DeathCause::create($validated);
        flash()->addSuccess('Causa de Óbito cadastrada com sucesso.');
        return redirect()->back();
    }
}
