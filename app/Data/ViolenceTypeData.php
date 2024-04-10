<?php

namespace App\Data;

use App\Models\ViolenceType;
use Spatie\LaravelData\Data;

/** @typescript */
class ViolenceTypeData extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $name,
        public ?string $description,
    ) {}

    public static function fromModel(ViolenceType $violenceType): self
    {
        return new self(
            id: $violenceType->id,
            name: $violenceType->name,
            description: $violenceType->description,
        );
    }
}
