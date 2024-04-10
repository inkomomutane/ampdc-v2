<?php

namespace App\Data;
use App\Models\Neighborhood;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
/** @typescript */
class NeighborhoodData extends Data
{
    public function __construct(
      public ?string $id,
      public ?string $name,
      public Lazy|null|DistrictData $district
    ) {}

    public static function fromModel(Neighborhood $neighborhood): self
    {
        return new self(
            id: $neighborhood->id,
            name: $neighborhood->name,
            district: Lazy::whenLoaded('district', $neighborhood, static fn() => DistrictData::fromModel($neighborhood->district))
        );
    }
}
