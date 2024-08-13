<?php

namespace App\Data;

use App\Models\SupposedReasonOfViolence;
use Spatie\LaravelData\Data;

/** @typescript */
class SupposedReasonOfViolenceData extends Data
{
    public function __construct(
        public readonly ?string  $id,
        public readonly ?string $name,
    ){}

    public static function fromModel(SupposedReasonOfViolence $supposedReasonOfViolence): self
    {
        return new self(
            id: $supposedReasonOfViolence->id,
            name: $supposedReasonOfViolence->name,
        );
    }
}


