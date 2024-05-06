<?php

namespace App\Models;

use App\Data\BaseDataClass;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class SupposedReasonOfViolence extends Model
{
    use HasUlids;
    use WithData;
    public $incrementing  = false;

    public string $dataClass = BaseDataClass::class;

    protected $fillable = [
        'name'
    ];
}
