<?php

namespace App\Models;

use App\Data\VictimData;
use App\Enums\CivilState;
use App\Enums\EducationLevel;
use App\Enums\Gender;
use App\Observers\CreateBirthDateAfterSavingVictimObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

#[ObservedBy(CreateBirthDateAfterSavingVictimObserver::class)]
class Victim extends Model
{
    use HasFactory;
    use HasUlids;
    use WithData;

    protected $fillable = [
        'name',
        'age',
        'date_of_birth',
        'gender',
        'civil_state',
        'contact',
        'has_profession',
        'profession',
        'education_level',
        'contact_alternative',
        'contact_person',
        'contact_person_relationship',
        'has_children',
        'number_of_children',
        'live_with_other_parents',
        'relationship_duration',
        'city',
        'neighborhood',
        'address'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'civil_state' => CivilState::class,
        'gender' => Gender::class,
        'education_level' => EducationLevel::class,
        'has_profession' => 'boolean',
        'has_children' => 'boolean',
        'live_with_other_parents' => 'boolean'
    ];


    protected string $dataClass = VictimData::class;

    public function cases(): HasMany
    {
        return $this->hasMany(VictimCase::class);
    }
}
