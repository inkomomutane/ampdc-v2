<?php

namespace App\Observers;

use App\Models\Victim;

class CreateBirthDateAfterSavingVictimObserver
{
    public function created(Victim $victim): void
    {
        $victim->date_of_birth = now()->subYears($victim->age);
        $victim->save();
    }
}
