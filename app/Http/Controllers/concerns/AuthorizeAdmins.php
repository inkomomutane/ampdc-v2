<?php

namespace App\Http\Controllers\concerns;

use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;

trait AuthorizeAdmins
{
    public function authorizeAction():void
    {
        \Gate::allowIf(\Auth::user()?->hasAnyRole([Roles::ADMIN,Roles::SUPER_ADMIN]),code: 401);
    }
}
