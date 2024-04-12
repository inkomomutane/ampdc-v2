<?php

namespace App\Data;

use App\Enums\CaseProgressStatus;
use App\Models\VictimCasesHistory;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class VictimCasesHistoryData extends  Data
{
    public function __construct(
        public ?string $id,
        public string $caseCode,
        public VictimData $victim,
        public UserData $caseRegisteredBy,
        public CaseProgressStatus $progressStatus,
        public ?string $caseDetails,
        public ?string $progressDetails,
        public UserData $caseUpdatedBy,
        public ?array $caseModifiedFields,
        public OrganizationData $organization,
        public string $violence_type_id,
        public OrganizationData|Lazy|null $forwardedToOrganization,
        public OrganizationData|Lazy|null $forwardedFromOrganization,
        public bool $isForwarded,
    ) {}

    public static function fromModel(VictimCasesHistory $victimCasesHistory): self
    {
        return new self(
            id: $victimCasesHistory->id,
            caseCode: $victimCasesHistory->case_code,
            victim: VictimData::fromModel($victimCasesHistory->victim),
            caseRegisteredBy: UserData::fromModel($victimCasesHistory->caseRegisteredBy),
            progressStatus: $victimCasesHistory->progress_status,
            caseDetails: $victimCasesHistory->case_details,
            progressDetails: $victimCasesHistory->progress_details,
            caseUpdatedBy: UserData::fromModel($victimCasesHistory->caseUpdatedBy),
            caseModifiedFields: $victimCasesHistory->case_modified_fields,
            organization: OrganizationData::fromModel($victimCasesHistory->organization),
            violence_type_id: $victimCasesHistory->violence_type_id,
            forwardedToOrganization: Lazy::whenLoaded('toOrganization', $victimCasesHistory, static fn() => OrganizationData::fromModel($victimCasesHistory->toOrganization)),
            forwardedFromOrganization: Lazy::whenLoaded('fromOrganization', $victimCasesHistory, static fn() => OrganizationData::fromModel($victimCasesHistory->fromOrganization)),
            isForwarded: $victimCasesHistory->is_forwarded,
        );
    }
}
