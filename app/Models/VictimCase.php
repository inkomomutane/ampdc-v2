<?php

namespace App\Models;

use App\Data\VictimCaseData;
use App\Enums\CaseProgressStatus;
use App\Enums\PeriodOfViolenceAct;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class VictimCase extends Model
{
    use HasUlids;
    use WithData;

    public $incrementing = false;

    public string $dataClass = VictimCaseData::class;

    public $casts = [
        'period_of_violence_act' => PeriodOfViolenceAct::class,
        'progress_status' => CaseProgressStatus::class,
        'is_violence_caused_death' => 'boolean',
        'is_terminated' => 'boolean',
        'updated_fields' => 'array',
    ];

    protected $fillable = [
        'case_code',
        'victim_id',
        'violence_type_id',
        'perpetrator_id',
        'period_of_violence_act',
        'violence_incident_location_id',
        'supposed_reason_of_violence_id',
        'violence_details',
        'is_violence_caused_death',
        'progress_status',
        'updated_fields',
        'organization_id',
        'forwarded_to_organization_id',
        'forwarded_from_organization_id',
        'is_terminated',
        'conclusion',
        'case_registered_by_id',
        'case_updated_by_id',
    ];


    public function victim() : BelongsTo
    {
        return $this->belongsTo(Victim::class);
    }

    public function violenceType() : BelongsTo
    {
        return $this->belongsTo(ViolenceType::class);
    }

    public function perpetrator() : BelongsTo
    {
        return $this->belongsTo(Perpetrator::class);
    }

    public function violenceIncidentLocation() : BelongsTo
    {
        return $this->belongsTo(ViolenceIncidentLocation::class);
    }

    public function supposedReasonOfViolence() : BelongsTo
    {
        return $this->belongsTo(SupposedReasonOfViolence::class);
    }

    public function organization() : BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function forwardedToOrganization() : BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function forwardedFromOrganization() : BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function caseRegisteredBy() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function caseUpdatedBy() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
