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
        return $this->hasMany(VictimCase::class, 'organization_id')
            ->where('is_forwarded', false);
    }

    public function receivedCases() :HasMany
    {
        return $this->hasMany(VictimCase::class, 'forwarded_to_organization_id')
            ->where('is_forwarded', true);
    }

    public function forwardedCases() :HasMany
    {
        return $this->hasMany(VictimCase::class, 'forwarded_from_organization_id')
            ->where('is_forwarded', true);
    }
}
