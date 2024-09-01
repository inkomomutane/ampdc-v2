<?php

namespace App\Data;

use App\Models\VictimCase;
use Spatie\LaravelData\Data;
/** @typescript  */
class VictimCaseShortDto extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $caseCode,
        public bool $isCausedDeath,
        public bool $isTerminated,
    ) {}


    public static function fromModel(VictimCase $victimCase): self
    {
        return new self(
            id: $victimCase->id,
            caseCode: $victimCase->case_code,
            isCausedDeath: $victimCase->is_violence_caused_death,
            isTerminated: $victimCase->is_terminated,
        );
    }
}
