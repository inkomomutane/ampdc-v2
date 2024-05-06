<?php

namespace App\Http\Controllers\Perpetrator;

use App\Http\Controllers\Controller;
use App\Models\Perpetrator;
use Illuminate\Http\Request;

class StorePerpetratorController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
        ]);
        $perpetrator = Perpetrator::create($validated);
        flash()->addSuccess('Perpetrador adicionado com sucesso.');
        return redirect()->back();
    }
}
