<?php

namespace App\Data;

use App\Models\ViolenceIncidentLocation;
use Spatie\LaravelData\Data;

/** @typescript */
class ViolenceIncidentLocationData extends Data
{
    public function __construct(
        public readonly ?string  $id,
        public readonly ?string $name,
    ){}

    public static function fromModel(ViolenceIncidentLocation $violenceIncidentLocation): self
    {
        return new self(
            id: $violenceIncidentLocation->id,
            name: $violenceIncidentLocation->name,
        );
    }
}
