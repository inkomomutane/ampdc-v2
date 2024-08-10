<?php

namespace App\Http\Controllers\Victim;

use Inertia\Inertia;

class RegisterDataOfVictimController
{
    public function __invoke()
    {
        return Inertia::render('RegisterVictimData');
    }
}
