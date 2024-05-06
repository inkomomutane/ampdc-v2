<?php

namespace App\Data;

use App\Enums\CivilState;
use App\Enums\Gender;
use App\Models\Victim;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript **/
class VictimData extends Data
{
    public function __construct(
        public string $name,
        public int $age,
        public ?string $date_of_birth,
        public ?CivilState $civilState,
        public ?Gender $gender,
        public NeighborhoodData|Lazy|null $neighborhood,
        public ?string $contact,
    ) {}

    public static function fromModel(Victim $victim): self
    {
        return new self(
            name: $victim->name,
            age: $victim->age,
            date_of_birth: $victim->date_of_birth,
            civilState: $victim->civil_state,
            gender: $victim->gender,
            neighborhood: Lazy::whenLoaded(
                relation: 'neighborhood',
                model:  $victim,
                value: static fn() =>
                NeighborhoodData::fromModel($victim->neighborhood)
            ),
            contact: $victim->contact,
        );
    }
}
