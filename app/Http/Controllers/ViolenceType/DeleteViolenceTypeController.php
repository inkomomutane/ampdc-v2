<?php

namespace App\Http\Controllers\ViolenceType;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\ViolenceType;

class DeleteViolenceTypeController extends Controller
{
    public function __invoke(ViolenceType $violenceType)
    {
        \DB::beginTransaction();
        $violenceType->delete();
        \DB::commit();
        flash()->addSuccess('Tipo de violência excluída com sucesso.');
        return redirect()->back();
    }
}
