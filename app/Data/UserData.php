<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class UserData extends Data
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $contact,
        public readonly ?bool $active,
        public readonly RoleData|null|Lazy $role,
    ) {
    }

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            contact: $user->contact,
            active: $user->active,
            role: Lazy::whenLoaded('roles',$user, fn() => $user->roles?->first()?->getData()),
        );
    }
}
