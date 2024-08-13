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
        public string $id,
        public string $caseCode,
        public Lazy|VictimData $victim,
        public Lazy|ViolenceTypeData $violenceType,
        public Lazy|PerpetratorData $perpetrator,
        public ?PeriodOfViolenceAct $periodOfViolenceAct,
        public Lazy|ViolenceIncidentLocationData $violenceIncidentLocation,
        public Lazy|SupposedReasonOfViolenceData $supposedReasonOfViolence,
        public ?string $violenceDetails,
        public ?bool $isViolenceCausedDeath,
        public ?bool $isTerminated,
        public ?string $conclusion,
        public Lazy|UserData $caseRegisteredBy,
        public Lazy|OrganizationData $caseRegisteredByOrganization,
        public ?string $caseRegisteredAt,
        public ?string $caseRegisteredAddress,
        public ?string $caseRegisteredAgent,
        public ?string $caseRegisteredCity,
        public ?string $caseRegisteredProvince,
        public ?string $caseRegisteredDistrict,
        public ?string $perpetratorRelationship,
        public ?string $perpetratorName,
        public ?string $perpetratorProfession,
        public ?string $perpetratorAddress,
        public ?string $perpetratorContact,
        public ?string $perpetratorContactAlternative,
        public bool $isViolenceReportedToAuthorities,
        public bool $isTheFirstTime,
        public ?string $lastViolencesDescription,
        public bool $isTheLastCasesReportedToAuthorities,
        public bool $areLastCasesResolved,
        public ?string $lastCasesResolutionDetails,
    ) {}

    public static function fromModel(VictimCase $victimCase) : self
    {
       return new self(
           id: $victimCase->id,
           caseCode: $victimCase->case_code,
           victim: Lazy::whenLoaded('victim', $victimCase,fn() => VictimData::fromModel($victimCase->victim)),
           violenceType: Lazy::whenLoaded('violenceType', $victimCase,fn() => ViolenceTypeData::fromModel($victimCase->violenceType)),
           perpetrator: Lazy::whenLoaded('perpetrator', $victimCase,fn() => PerpetratorData::fromModel($victimCase->perpetrator)),
              periodOfViolenceAct: $victimCase->period_of_violence_act,
                violenceIncidentLocation: Lazy::whenLoaded('violenceIncidentLocation', $victimCase,fn() => ViolenceIncidentLocationData::fromModel($victimCase->violenceIncidentLocation)),
                supposedReasonOfViolence: Lazy::whenLoaded('supposedReasonOfViolence', $victimCase,fn() => SupposedReasonOfViolenceData::fromModel($victimCase->supposedReasonOfViolence)),
                violenceDetails: $victimCase->violence_details,
                isViolenceCausedDeath: $victimCase->is_violence_caused_death,
                isTerminated: $victimCase->is_terminated,
                conclusion: $victimCase->conclusion,
                caseRegisteredBy: Lazy::whenLoaded('caseRegisteredBy', $victimCase,fn() => UserData::fromModel($victimCase->caseRegisteredBy)),
                caseRegisteredByOrganization: Lazy::whenLoaded('caseRegisteredByOrganization', $victimCase,fn() => OrganizationData::fromModel($victimCase->caseRegisteredByOrganization)),
                caseRegisteredAt: $victimCase->case_registered_at,
                caseRegisteredAddress: $victimCase->case_registered_address,
                caseRegisteredAgent: $victimCase->case_registered_agent,
                caseRegisteredCity: $victimCase->case_registered_city,
                caseRegisteredProvince: $victimCase->case_registered_province,
                caseRegisteredDistrict: $victimCase->case_registered_district,
                perpetratorRelationship: $victimCase->perpetrator_relationship,
                perpetratorName: $victimCase->perpetrator_name,
                perpetratorProfession: $victimCase->perpetrator_profession,
                perpetratorAddress: $victimCase->perpetrator_address,
                perpetratorContact: $victimCase->perpetrator_contact,
                perpetratorContactAlternative: $victimCase->perpetrator_contact_alternative,
                isViolenceReportedToAuthorities: $victimCase->is_violence_reported_to_authorities,
                isTheFirstTime: $victimCase->is_the_first_time,
                lastViolencesDescription: $victimCase->last_violences_description,

                isTheLastCasesReportedToAuthorities: $victimCase->is_the_last_cases_reported_to_authorities,
                areLastCasesResolved: $victimCase->are_last_cases_resolved,
                lastCasesResolutionDetails: $victimCase->last_cases_resolution_details,

       );
    }
}
