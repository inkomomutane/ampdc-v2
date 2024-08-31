<?php

namespace App\Http\Controllers\concerns;

use App\Enums\Roles;

trait AuthorizeWriters
{
    public function authorizeAction()
    {
        abort_if(!\Auth::user()?->hasAnyRole([Roles::WRITER]),401);
    }
}
