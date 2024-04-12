<?php

namespace App\Events;

use App\Models\Organization;
use App\Models\User;
use App\Models\Victim;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class ForwardedCases
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public Victim $victim,
        /** @var Organization[] $organizations */
        public Collection $organizations,
        public  User $createdBy,
        public User $updatedBy,
        public Organization $fromOrganization,
        public string $caseCode
    )
    {
        //
    }

}
