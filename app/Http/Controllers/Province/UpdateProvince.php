<?php

namespace App\Http\Controllers\Province;

use App\Models\Province;
use Illuminate\Validation\Rule;

class UpdateProvince
{


    public function __invoke(Province $province)
    {
        $validated = request()?->validate([
            'name' => ['required', Rule::unique(Province::class, 'name')->ignore($province->id, 'id')],
        ]);

        try {
            $province->name = $validated['name'];
            $province->save();
            flash()->addSuccess('Province updated successful.');
        } catch (\Throwable $th) {
            flash()->addError('Error updating province');
        }

        return \redirect()->back();
    }
}
