<?php

namespace  App\Http\Controllers\District;

use App\Models\District;
use Illuminate\Http\Request;

class CreateDistrict
{

    public function handle(array $district): District
    {
        return District::create($district);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:districts,name',
            'province_id' => 'required|numeric',
        ];
    }

    public function __invoke(Request $request)
    {
        $this->handle($request->validate($this->rules()));
        flash()->addSuccess('District created successful.');
        return \redirect()->back();
    }
}
