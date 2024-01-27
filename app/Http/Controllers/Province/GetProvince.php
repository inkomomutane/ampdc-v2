<?php

namespace App\Http\Controllers\Province;

use App\Data\ProvinceData;
use App\Models\Province;
use Spatie\LaravelData\Exceptions\InvalidDataClass;

class GetProvince
{

    /**
     * @throws InvalidDataClass
     */
    public function handle(Province $province): ?ProvinceData
    {
        return Province::find($province->id)?->getData();
    }

    /**
     * @throws InvalidDataClass
     */
    public function __invoke(Province $province)
    {
        return $this->handle($province);
    }
}
