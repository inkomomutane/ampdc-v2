<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ViolenceTypeData extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $name,
        public ?string $description,
    ) {}
}
