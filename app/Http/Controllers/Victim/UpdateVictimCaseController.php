<?php

namespace App\Http\Controllers\Victim;

use App\Enums\PeriodOfViolenceAct;
use App\Models\User;
use App\Models\Victim;
use App\Models\VictimCase;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateVictimCaseController
{
    private function rules() : array {
        return  [
              'violence_type_id' => 'required|exists:violence_types,id',
              'supposed_reason_of_violence_id' => 'exists:supposed_reason_of_violences,id',
              'perpetrator_id' => 'exists:perpetrators,id',
              'perpetrator_name' => 'nullable|string',
              'perpetrator_profession' => 'nullable|string',
              'perpetrator_address' => 'nullable|string',
              'perpetrator_contact' => 'nullable|string',
              'period_of_violence_act' => ['nullable',Rule::in(PeriodOfViolenceAct::getValues())],
              'violence_incident_location_id' => 'nullable|exists:violence_incident_locations,id',
              'violence_details' => 'nullable|string',
              'is_violence_caused_death' => 'required|bool',
              'is_the_first_time' => 'required|bool',
              'is_violence_reported_to_authorities' => 'nullable|bool',
             'last_violences_description' => 'nullable|string',
             'is_the_last_cases_reported_to_authorities' => ['nullable','bool'],
             'are_last_cases_resolved' => ['required_if:is_the_last_cases_reported_to_authorities,true','nullable','bool'],
             'last_cases_resolution_details' => ['required_if:are_last_cases_resolved,true','nullable','string'],
        ];
    }

    /**
     * @throws Exception
     */
    public function __invoke(VictimCase $case, Request $request) {
       $data = $request->validate($this->rules());
        if (self::handle($case,$data)) {
            flash()->addSuccess('Caso de violência actulizado com sucesso.');
        } else {
            flash()->addError('Erro ao actualizar dados de caso de violência.');
        }
        return redirect()->back();
    }


    /**
     * @param Victim $victim
     * @param array{
     *     violence_type_id:string,
     *     supposed_reason_of_violence_id:string,
     *     perpetrator_id:string,
     *     perpetrator_name:string,
     *     perpetrator_profession:string,
     *     perpetrator_address:string,
     *     perpetrator_contact:string,
     *     period_of_violence_act:string,
     *     violence_incident_location_id:string,
     *     violence_details:string,
     *     is_violence_caused_death:bool,
     *     is_the_first_time:bool,
     *     is_violence_reported_to_authorities:bool,
     *     last_violences_description?:string,
     *     is_the_last_cases_reported_to_authorities?:bool,
     *     are_last_cases_resolved?:bool,
     *     last_cases_resolution_details?:string,
     *     case_registered_address?:string,
     *     case_registered_agent?:string,
     *     case_registered_city?:string,
     *     case_registered_province?:string,
     * } $data
     * @return bool
     * @throws Exception
     */
    public static  function handle(VictimCase $case,array $data): bool
    {
        try {
            DB::beginTransaction();
              $case->update($data);
            DB::commit();
            return true;
        }catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return false;
    }
}
