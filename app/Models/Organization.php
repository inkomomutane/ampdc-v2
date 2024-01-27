<?php

namespace App\Models;

use App\Data\OrganizationData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasUlids;
    public $incrementing = false;
    protected $fillable = ['name', 'services'];
    protected string $dataClass = OrganizationData::class;
}
