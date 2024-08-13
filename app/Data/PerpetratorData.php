<?php

namespace App\Data;

use App\Models\Perpetrator;
use Spatie\LaravelData\Data;

/** @typescript */
class PerpetratorData extends Data
{
    public function __construct(
        public readonly ?string  $id,
        public readonly ?string $name,
    ){}

    public static function fromModel(Perpetrator $perpetrator): self
    {
        return new self(
            id: $perpetrator->id,
            name: $perpetrator->name,
        );
    }
}


