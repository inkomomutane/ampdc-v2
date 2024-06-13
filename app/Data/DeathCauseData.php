<?php

namespace App\Data;

use App\Models\DeathCause;
use Spatie\LaravelData\Data;

/** @typescript */
class DeathCauseData extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $name,
        public ?string $description,
    ) {}

    public static function fromModel(DeathCause $deathCause): self
    {
        return new self(
            id: $deathCause->id,
            name: $deathCause->name,
            description: $deathCause->description,
        );
    }
}
