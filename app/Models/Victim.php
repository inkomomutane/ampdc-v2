<?php

namespace App\Models;

use App\Data\VictimData;
use App\Enums\CivilState;
use App\Enums\Gender;
use App\Observers\CreateBirthDateAfterSavingVictimObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'neighborhood_id',
        'contact',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'civil_state' => CivilState::class,
        'gender' => Gender::class
    ];

    protected $with = ['neighborhood'];

    protected string $dataClass = VictimData::class;


    public function neighborhood(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }

}
