<?php

namespace App\Models;

use App\Data\ProvinceData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;

class Province extends \Eloquent
{
    use WithData;

    protected $fillable = ['name'];
    protected string $dataClass = ProvinceData::class;

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
