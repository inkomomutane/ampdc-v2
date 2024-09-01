<?php

namespace App\Http\Controllers\Victim;

use App\Http\Controllers\Controller;
use App\Models\Victim;

class PrintVictimData extends Controller
{
    public function __invoke(Victim $victim)
    {
       return \Pdf::loadView('pdf.victim_data', ['victim' => $victim])->stream();
    }
}
