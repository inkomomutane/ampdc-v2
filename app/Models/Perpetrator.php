<?php

namespace App\Models;

use App\Data\PerpetratorData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class Perpetrator extends Model
{
    use HasUlids;
    use WithData;
    public $incrementing  = false;

    public string $dataClass = PerpetratorData::class;

    protected $fillable = [
        'name'
    ];

}
