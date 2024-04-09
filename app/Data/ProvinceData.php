<?php

namespace App\Data;

use Spatie\LaravelData\Data;
/** @typescript */
class ProvinceData extends Data
{
    public function __construct(
      public ?string $id,
      public ?string $name
    ) {}
}
