<?php

namespace App\Data;

use Spatie\LaravelData\Data;

/** @typescript */
class PerpetratorData extends Data
{
    public function __construct(
        public readonly ?string  $id,
        public readonly ?string $name,
    ){}
}
