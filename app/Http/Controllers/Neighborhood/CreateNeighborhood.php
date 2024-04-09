<?php

namespace App\Http\Controllers\Neighborhood;

use App\Models\Neighborhood;

class CreateNeighborhood
{

    public function handle(array $city): Neighborhood
    {
        return Neighborhood::create($city);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:neighborhoods,name',
            'district_id' => 'required',
        ];
    }

    public function __invoke(\Request $request)
    {
        $validated = $request->validate($this->rules());
        $this->handle($validated);
        flash()->addSuccess('Neighborhood created successful.');
        return \redirect()->back();
    }
}
