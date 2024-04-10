<?php

namespace App\Http\Controllers\ViolenceType;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\ViolenceType;
use Illuminate\Http\Request;

class StoreViolenceTypeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'description' => ['nullable','string'],
        ]);
        $violenceType = ViolenceType::create($validated);
        flash()->addSuccess('Tipo de violência cadastrada com sucesso.');
        return redirect()->back();
    }
}
