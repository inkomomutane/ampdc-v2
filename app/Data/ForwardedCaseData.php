<?php

namespace App\Data;

use App\Enums\CaseProgressStatus;
use App\Models\ForwardingCase;
use Spatie\LaravelData\Data;

/** @typescript  */
class ForwardedCaseData extends Data
{
    public function __construct(
        public string                              $id,
        public VictimCaseData                      $victim,
        public CaseProgressStatus|string           $status,
        public string                              $organizationName,
        public string                              $forwardedTo,
        public array|string|null                   $caseUpdates,
        public string                              $conclusion,
        public string                              $caseDetails,

    )
    {
    }


    public static function fromModel(ForwardingCase $case):self{
        return new self(
            id: $case->id,
            victim: VictimCaseData::fromModel($case->case),
            status: $case->status,
            organizationName: $case->organization->name,
            forwardedTo: $case->forwardedTo->name,
            caseUpdates: $case->case_updates,
            conclusion: $case->conclusion,
            caseDetails: $case->case_details
        );
    }
}
