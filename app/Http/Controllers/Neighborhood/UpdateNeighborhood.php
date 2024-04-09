<?php

namespace App\Http\Controllers\Neighborhood;

use App\Models\Bairro;
use App\Models\Neighborhood;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateNeighborhood
{

    /**
     * @throws \Throwable
     */
    public function __invoke(Neighborhood $neighborhood)
    {
        $validated = request()?->validate([
            'name' => ['required', Rule::unique(Neighborhood::class, 'name')->ignore($neighborhood->id, 'id')],
            'district_id' => 'required',
        ]);

        try {

            $neighborhood->name = $validated['name'];
            $neighborhood->district_id = $validated['district_id'];
            $neighborhood->save();

            flash()->addSuccess('Neighborhood updated successful');
        } catch (\Throwable $th) {
            flash()->addError('Error updating neighborhood');
        }
        return \redirect()->back();
    }
}
