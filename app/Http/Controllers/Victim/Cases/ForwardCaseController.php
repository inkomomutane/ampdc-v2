<?php

namespace App\Http\Controllers\Victim\Cases;

use App\Enums\CaseProgressStatus;
use App\Models\ForwardingCase;
use App\Models\Organization;
use App\Models\VictimCase;
use Illuminate\Database\Eloquent\Casts\Json;
class ForwardCaseController
{

    public function __invoke(VictimCase $case,Organization $organization)
    {
        try {
            if(ForwardingCase::where('case_id', $case->id)->exists()){
                ForwardingCase::where('case_id', $case->id)->update([
                    'forwarded_to' => $organization->id,
                    'status' => CaseProgressStatus::FORWARDED,
                ]);
            }else{
                ForwardingCase::create([
                    'case_id' => $case->id,
                    'forwarded_to' => $organization->id,
                    'status' => CaseProgressStatus::FORWARDED,
                    'created_at' => now(),
                    'case_updates' => Json::encode([]),
                    'organization_id'  => auth()->user()->organization_id,
                    'conclusion' => '',
                    'case_details' => $case->violence_details,
                ]);
            }

            flash()->addSuccess('Caso de violência encaminhado com sucesso.');
        }catch (\Exception $exception){
            flash()->addError('Erro ao encaminhar caso de violência.');
        }
        return redirect()->back();
    }


}
