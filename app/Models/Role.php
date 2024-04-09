<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\LaravelData\WithData;


class Role extends \Spatie\Permission\Models\Role
{
    use HasUlids;
    use WithData;

    public $incrementing = false;

    protected string  $dataClass = \App\Data\RoleData::class;

    protected $fillable = [
        'name',
        'guard_name',
    ];
}
