<?php

namespace App\Http\Controllers\SupposedReasonOfViolence;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\SupposedReasonOfViolence;
use Illuminate\Http\Request;

class UpdateSupposedReasonOfViolenceController extends Controller
{
    public function __invoke(SupposedReasonOfViolence $supposedReasonOfViolence, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
        ]);
        $supposedReasonOfViolence->update($validated);
        flash()->addSuccess('Motivo de violência actualizado com sucesso.');
        return redirect()->back();
    }
}
