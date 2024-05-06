<?php

namespace App\Http\Controllers\SupposedReasonOfViolence;

use App\Http\Controllers\Controller;
use App\Models\SupposedReasonOfViolence;

class DeleteSupposedReasonOfViolenceController extends Controller
{
    public function __invoke(SupposedReasonOfViolence $supposedReasonOfViolence)
    {
        \DB::beginTransaction();
        $supposedReasonOfViolence->delete();
        \DB::commit();
        flash()->addSuccess('Motivo de violência excluído com sucesso.');
        return redirect()->back();
    }
}
