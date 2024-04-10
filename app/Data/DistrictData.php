<?php

namespace App\Data;

use App\Models\District;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class DistrictData extends Data
{
    public function __construct(
      public ?string $id,
      public ?string $name,
      public Lazy|null|ProvinceData $province,
    ) {}

    public static function fromModel(District $district): self
    {
        return new self(
            id: $district->id,
            name: $district->name,
            province: Lazy::whenLoaded('province', $district, static fn() => ProvinceData::fromModel($district->province))
        );
    }
}
