<?php

namespace App\Listeners;

use App\Enums\CaseProgressStatus;
use App\Events\ForwardedCases;
use App\Models\Organization;
use App\Models\VictimCase;

class ForwardCasesListener
{
    /**
     * Handle the event.
     */
    public function handle(ForwardedCases $event): void
    {
        $event->organizations->each(fn(Organization $organization) => VictimCase::create([
            'victim_id' => $event->victim->id,
            'organization_id' => $organization->id,
            'case_registered_by_id' => $event->createdBy->id,
            'progress_status' => CaseProgressStatus::FORWARDED,
            'case_details' => $event->victim->violence_details,
            'case_updated_by_id' => $event->updatedBy->id,
            'violence_type_id' => $event->victim->violence_type_id,
            'is_forwarded' => true,
            'forwarded_to_organization_id' => $organization->id,
            'forwarded_from_organization_id' => $event->fromOrganization->id,
            'case_code' => $event->caseCode
        ])
        );
    }
}
