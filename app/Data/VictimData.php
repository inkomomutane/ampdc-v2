<?php

namespace App\Data;

use App\Enums\CivilState;
use App\Enums\EducationLevel;
use App\Enums\Gender;
use App\Models\Victim;
use Spatie\LaravelData\Data;

/** @typescript **/
class VictimData extends Data
{
    public function __construct(
        public ?string $id,
        public string $name,
        public int $age,
        public Gender $gender,
        public CivilState $civil_state,
        public ?string $contact,
        public ?string $profession,
        public ?EducationLevel $education_level,
        public ?string $contact_alternative,
        public ?string $contact_person,
        public ?string $city,
        public ?string $neighborhood,
        public ?string $address,
    ) {}

    public static function fromModel(Victim $victim): self
    {
        return new self(
            id: $victim->id,
            name: $victim->name,
            age: $victim->age,
            gender: $victim->gender,
            civil_state: $victim->civil_state,
            contact: $victim->contact,
            profession: $victim->profession,
            education_level: $victim->education_level,
            contact_alternative: $victim->contact_alternative,
            contact_person: $victim->contact_person,
            city: $victim->city,
            neighborhood: $victim->neighborhood,
            address: $victim->address,
        );
    }
}
