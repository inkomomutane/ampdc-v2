<?php

namespace App\Data;

use App\Models\Organization;
use Spatie\LaravelData\Data;

/** @typescript */
class OrganizationData extends Data
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?string $services
    )
    {
    }

    public static function fromModel(Organization $organization): self
    {
        return new self(
            id: $organization->id,
            name: $organization->name,
            services: $organization->services,
        );
    }
}
