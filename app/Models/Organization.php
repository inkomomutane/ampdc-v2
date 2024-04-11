<?php

namespace App\Models;

use App\Data\OrganizationData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class Organization extends Model
{
    use HasUlids;
    use WithData;

    public $incrementing = false;
    protected $fillable = ['name', 'services'];
    protected string $dataClass = OrganizationData::class;

    public function cases() : HasMany
    {
        return $this->hasMany(VictimCasesHistory::class);
    }

    public function receivedCases() :HasMany
    {
        return $this->hasMany(VictimCasesHistory::class);
    }

    public function forwardedCases() :HasMany
    {
        return $this->hasMany(VictimCasesHistory::class);
    }
}
