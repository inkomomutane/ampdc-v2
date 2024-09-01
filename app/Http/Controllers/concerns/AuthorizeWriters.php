<?php

namespace App\Http\Controllers\concerns;

use App\Enums\Roles;
use App\Models\Role;

trait AuthorizeWriters
{
    public function authorizeAction()
    {
        abort_if(!\Auth::user()?->hasAnyRole([Roles::WRITER,Roles::SUPER_ADMIN]),401);
    }
}
