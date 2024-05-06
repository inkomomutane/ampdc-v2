<?php

namespace App\Http\Controllers\ViolenceIncidentLocation;

use App\Http\Controllers\Controller;
use App\Models\ViolenceIncidentLocation;

class DeleteViolenceIncidentLocationController extends Controller
{
    public function __invoke(ViolenceIncidentLocation $violenceIncidentLocation)
    {
        \DB::beginTransaction();
        $violenceIncidentLocation->delete();
        \DB::commit();
        flash()->addSuccess('Local da violência excluído com sucesso.');
        return redirect()->back();
    }
}
