<?php

namespace App\Models;

use App\Data\NeighborhoodData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;

class Neighborhood extends Model
{
    use WithData;

    protected $fillable = ['name'];
    protected string $dataClass = NeighborhoodData::class;

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
