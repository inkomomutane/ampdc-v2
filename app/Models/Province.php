<?php

namespace App\Models;

use App\Data\ProvinceData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class Province extends Model
{
    use WithData;
    use HasUlids;

    protected $fillable = ['name'];
    protected string $dataClass = ProvinceData::class;

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
