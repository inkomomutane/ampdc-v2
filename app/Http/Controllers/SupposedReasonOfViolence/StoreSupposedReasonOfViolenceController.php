<?php

namespace App\Http\Controllers\SupposedReasonOfViolence;

use App\Http\Controllers\Controller;
use App\Models\SupposedReasonOfViolence;
use Illuminate\Http\Request;

class StoreSupposedReasonOfViolenceController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
        ]);
        $supposedReasonOfViolence = SupposedReasonOfViolence::create($validated);
        flash()->addSuccess('Motivo de violência adicionado com sucesso.');
        return redirect()->back();
    }
}
