<?php

namespace App\Http\Controllers\DeathCause;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\DeathCause;

class DeleteDeathCauseController extends Controller
{
    public function __invoke(DeathCause $deathCause)
    {
        \DB::beginTransaction();
        $deathCause->delete();
        \DB::commit();
        flash()->addSuccess('Causa de Óbito excluída com sucesso.');
        return redirect()->back();
    }
}
