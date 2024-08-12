<?php

namespace App\Models;

use App\Enums\CaseProgressStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForwardingCase extends Model
{
    use HasFactory;
    use HasUlids;

    protected  $fillable = [
      'case_id',
      'status',
      'organization_id',
      'forwarded_to',
      'case_updates',
      'conclusion',
      'case_details'
    ];

    protected function casts() :array
    {
        return [
            'status' => CaseProgressStatus::class,
        ];
    }

    public function case(): BelongsTo
    {
        return $this->belongsTo(VictimCase::class,'case_id','id');
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class,'organization_id','id');
    }

    public function forwardedTo(): BelongsTo
    {
        return $this->belongsTo(Organization::class,'forwarded_to','id');
    }
}
