<?php

namespace  App\Http\Controllers\District;



use App\Models\District;
use Illuminate\Validation\Rule;

class UpdateDistrict
{

    public function __invoke(District $district)
    {
        $validated = request()?->validate([
            'name' => ['required', Rule::unique(District::class, 'name')->ignore($district->id, 'id')],
            'province_id' => 'required',
        ]);

        try {
            $district->name = $validated['name'];
            $district->province_id = $validated['province_id'];
            $district->save();
            flash()->addSuccess('District updated successful');
        } catch (\Throwable $th) {

            flash()->addError('Error updating district.');
        }
        return \redirect()->back();
    }
}
