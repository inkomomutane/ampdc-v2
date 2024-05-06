<?php

namespace App\Http\Controllers\Perpetrator;

use App\Http\Controllers\Controller;
use App\Models\Perpetrator;

class DeletePerpetratorController extends Controller
{
    public function __invoke(Perpetrator $perpetrator)
    {
        \DB::beginTransaction();
        $perpetrator->delete();
        \DB::commit();
        flash()->addSuccess('Perpetrador excluído com sucesso.');
        return redirect()->back();
    }
}
