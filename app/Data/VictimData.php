<?php

namespace App\Data;

use App\Models\Victim;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
/** @typescript **/
class VictimData extends Data
{
    public function __construct(
        public string $name,
        public int $age,
        public string $date_of_birth,
        public NeighborhoodData|Lazy|null $neighborhood,
        public ViolenceTypeData|Lazy|null $violenceType,
        public string $violence_details,
        public string $contact,
    ) {}

    public static function fromModel(Victim $victim): self
    {
        return new self(
            name: $victim->name,
            age: $victim->age,
            date_of_birth: $victim->date_of_birth,
            neighborhood: Lazy::whenLoaded(relation: 'neighborhood', model:  $victim,
                value: static fn() =>
                NeighborhoodData::fromModel($victim->neighborhood)
            ),
            violenceType: Lazy::whenLoaded('violenceType',$victim,static fn() => ViolenceTypeData::fromModel($victim->violenceType)),
            violence_details: $victim->violence_details,
            contact: $victim->contact,
        );
    }
}
