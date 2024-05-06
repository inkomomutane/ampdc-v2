<?php

namespace App\Data;

use App\Enums\CaseProgressStatus;
use App\Enums\PeriodOfViolenceAct;
use App\Models\VictimCase;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class VictimCaseData extends  Data
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $caseCode,
        public readonly VictimData|Lazy  $victim,
        public readonly ViolenceTypeData|Lazy $violenceType,
        public readonly BaseDataClass|Lazy $perpetrator,
        public readonly PeriodOfViolenceAct $periodOfViolenceAct,
        public readonly BaseDataClass|Lazy $violenceIncidentLocation,
        public readonly BaseDataClass|Lazy $supposedReasonOfViolence,
        public readonly mixed $violenceDetails,
        public readonly bool   $isViolenceCausedDeath,
        public readonly CaseProgressStatus $progressStatus,
        public readonly mixed  $updatedFields,
        public readonly OrganizationData|Lazy $organization,
        public readonly OrganizationData|Lazy  $forwardedToOrganization,
        public readonly OrganizationData|Lazy  $forwardedFromOrganization,
        public readonly bool   $isTerminated,
        public readonly ?string $conclusion,
        public readonly UserData|Lazy $caseRegisteredBy,
        public readonly UserData|Lazy $caseUpdatedBy,
    ) {}

    public static function fromModel(VictimCase $victimCase) :self
    {
        return new self(
            id: $victimCase->id,
            caseCode: $victimCase->case_code,
            victim: Lazy::whenLoaded('victim',$victimCase,static fn() => $victimCase->victim->getData()),
            violenceType: Lazy::whenLoaded('violenceType',$victimCase,static fn() => $victimCase->violenceType->getData()),
            perpetrator: Lazy::whenLoaded('perpetrator',$victimCase,static fn() => $victimCase->perpetrator->getData()),
            periodOfViolenceAct: $victimCase->period_of_violence_act,
            violenceIncidentLocation: Lazy::whenLoaded('violenceIncidentLocation',$victimCase,static fn() => $victimCase->violenceIncidentLocation->getData()),
            supposedReasonOfViolence: Lazy::whenLoaded('supposedReasonOfViolence',$victimCase,static fn() => $victimCase->supposedReasonOfViolence->getData()),
            violenceDetails: $victimCase->violence_details,
            isViolenceCausedDeath: $victimCase->is_violence_caused_death,
            progressStatus: $victimCase->progress_status,
            updatedFields: $victimCase->updated_fields,
            organization: Lazy::whenLoaded('organization',$victimCase,static fn() => $victimCase->organization->getData()),
            forwardedToOrganization: Lazy::whenLoaded('forwardedToOrganization',$victimCase,static fn() => $victimCase->forwardedToOrganization->getData()),
            forwardedFromOrganization: Lazy::whenLoaded('forwardedFromOrganization',$victimCase,static fn() => $victimCase->forwardedFromOrganization->getData()),
            isTerminated: $victimCase->is_terminated,
            conclusion: $victimCase->conclusion,
            caseRegisteredBy: Lazy::whenLoaded('caseRegisteredBy',$victimCase,static fn() => $victimCase->caseRegisteredBy->getData()),
            caseUpdatedBy: Lazy::whenLoaded('caseUpdatedBy',$victimCase,static fn() => $victimCase->caseUpdatedBy->getData()),
        );
    }
}
