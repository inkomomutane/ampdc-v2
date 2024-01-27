<?php

namespace App\Http\Controllers\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Illuminate\Http\Request;

class CreateProvince
{

    public function handle(ProvinceData $province): Province
    {
        return Province::create($province->all());
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:provinces,name',
        ];
    }

    public function __invoke(Request $request)
    {
        $this->handle(ProvinceData::from($request->validate($this->rules())));
        flash()->addSuccess('Province created successful.');
        return \redirect()->back();
    }
}
