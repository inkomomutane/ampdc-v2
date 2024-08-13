<?php

namespace App\Models;

use App\Data\VictimCaseData;
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

    protected $with = [
        'victim',
        'violenceType',
        'perpetrator',
        'violenceIncidentLocation',
        'supposedReasonOfViolence',
        'caseRegisteredBy',
        'caseRegisteredByOrganization'
    ];

    public $casts = [
        'period_of_violence_act' => PeriodOfViolenceAct::class,
        'is_violence_caused_death' => 'boolean',
        'is_terminated' => 'boolean',
        'updated_fields' => 'array',
        'date_of_birth' => 'date',
        'case_registered_at' => 'datetime',
        'is_violence_reported_to_authorities' => 'boolean',
        'is_the_first_time' => 'boolean',
        'is_the_last_cases_reported_to_authorities' => 'boolean',
        'are_last_cases_resolved' => 'boolean'
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
        'is_terminated',
        'conclusion',
        'case_registered_by_id',
        'case_registered_by_organization_id',
        'case_registered_at',
        'case_registered_address',
        'case_registered_agent',
        'case_registered_city',
        'case_registered_province',
        'case_registered_district',
        'perpetrator_relationship',
        'perpetrator_name',
        'perpetrator_profession',
        'perpetrator_address',
        'perpetrator_contact',
        'perpetrator_contact_alternative',
        'is_violence_reported_to_authorities',
        'is_the_first_time',
        'last_violences_description',
        'is_the_last_cases_reported_to_authorities',
        'are_last_cases_resolved',
        'last_cases_resolution_details'
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

    public function caseRegisteredBy() : BelongsTo
    {
        return $this->belongsTo(User::class,'case_registered_by_id');
    }

    public function caseRegisteredByOrganization(): BelongsTo
    {
        return $this->belongsTo(Organization::class,'case_registered_by_organization_id');
    }
}
