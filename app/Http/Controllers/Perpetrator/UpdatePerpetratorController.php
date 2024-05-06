<?php

namespace App\Http\Controllers\Perpetrator;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Perpetrator;
use Illuminate\Http\Request;

class UpdatePerpetratorController extends Controller
{
    public function __invoke(Perpetrator $perpetrator, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
        ]);
        $perpetrator->update($validated);
        flash()->addSuccess('Perpetrador actualizado com sucesso.');
        return redirect()->back();
    }
}
