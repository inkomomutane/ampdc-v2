<?php

namespace App\Data;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
/** @typescript */
class NeighborhoodData extends Data
{
    public function __construct(
      public ?int $id,
      public ?string $name,
      public Lazy|null|DistrictData $district
    ) {}
}
