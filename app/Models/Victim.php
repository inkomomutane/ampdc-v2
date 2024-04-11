<?php

namespace App\Models;

use App\Data\VictimData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'age',
        'date_of_birth',
        'neighborhood_id',
        'violence_type_id',
        'violence_details',
        'contact',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    protected $with = ['neighborhood', 'violenceType'];

    protected string $dataClass = VictimData::class;


    public function neighborhood(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function violenceType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ViolenceType::class);
    }

}
