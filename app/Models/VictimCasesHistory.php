<?php

namespace App\Models;

use App\Enums\CaseProgressStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VictimCasesHistory extends Model
{
    use HasFactory;
    use HasUlids;

    protected $with = [
        'victim',
        'caseRegisteredBy',
        'caseUpdatedBy',
        'organization',
        'toOrganization',
        'fromOrganization'
    ];

    protected $casts = [
        'is_forwarded' => 'boolean',
        'progress_status' => CaseProgressStatus::class
    ];
protected $fillable = [
    'victim_id',
    'case_registered_by_id',
    'progress_status',
    'case_details',
    'progress_details',
    'case_updated_by_id',
    'case_modified_fields',
    'organization_id',
    'violence_type_id',
    'forwarded_to_organization_id',
    'forwarded_from_organization_id',
    'is_forwarded',
];

public function victim(): BelongsTo
{
    return $this->belongsTo(Victim::class);
}

public function caseRegisteredBy(): BelongsTo
{
    return $this->belongsTo(User::class, 'case_registered_by_id');
}

public function  caseUpdatedBy() : BelongsTo
{
    return $this->belongsTo(User::class, 'case_updated_by_id');
}

public function organization() : BelongsTo
{
    return $this->belongsTo(Organization::class);
}

 public function  toOrganization() : BelongsTo
 {
     return $this->belongsTo(Organization::class, 'forwarded_to_organization_id');
 }

    public function  fromOrganization() : BelongsTo
    {
        return $this->belongsTo(Organization::class, 'forwarded_from_organization_id');
    }


    public  function scopeNonForwarded(Builder $query) :void
    {
        $query->whereIsForwarded(false);
    }

    public function scopeForwardedCases(Builder $query,Organization $organization) :void
    {
         $query->whereIsForwarded( true)->where('forwarded_from_organization_id', $organization->id);
    }

    public function scopeReceivedCases(Builder $query, Organization $organization) :void
    {
        $query->
        whereIsForwarded(true)
            ->where('forwarded_to_organization_id', $organization->id);
    }
}
