<?php

namespace App\Http\Controllers\ViolenceType;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\ViolenceType;
use Illuminate\Http\Request;

class UpdateViolenceTypeController extends Controller
{
    public function __invoke(ViolenceType $violenceType, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'description' => ['nullable','string'],
        ]);

        $violenceType->update($validated);

        flash()->addSuccess('Tipo de violência actualizada com sucesso.');
        return redirect()->back();
    }
}
