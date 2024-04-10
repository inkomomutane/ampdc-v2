<?php

namespace App\Models;

use App\Data\ViolenceTypeData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolenceType extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'description',
    ];

    protected  string $dataClass  = ViolenceTypeData::class;

}
