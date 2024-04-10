<?php

namespace App\Data;

use App\Models\Province;
use Spatie\LaravelData\Data;
/** @typescript */
class ProvinceData extends Data
{
    public function __construct(
      public ?string $id,
      public ?string $name
    ) {}

    public static function fromModel(Province $province): self
    {
        return new self(
            id: $province->id,
            name: $province->name
        );
    }
}
