<?php

namespace App\Data;

use App\Models\Role;
use Spatie\LaravelData\Data;
/** @typescript */
class RoleData extends Data
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $name
    ){}


    public static function fromModel(Role $role): self
    {
        return new self(
            id: $role->id,
            name: $role->name
        );
    }
}
