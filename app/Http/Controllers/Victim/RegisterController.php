<?php

namespace App\Http\Controllers\Victim;

use App\Enums\CaseProgressStatus;
use App\Events\ForwardedCases;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Victim;
use App\Models\VictimCase;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function rules(): array
    {

        /**
         * name: "",
         * age: "",
         * gender: null,
         * civil_state: null,
         * neighborhood_id: null,
         * contact: "",
         * requires_forwards: false,
         * violence_type_id: null,
         * perpetrator_id:null,
         * period_of_violence_act: null,
         * violence_incident_location_id: null,
         * supposed_reason_of_violence_id: null,
         * violence_details: "",
         * forward_to_organization: null,
         * is_violence_caused_death: false
         */
        return [
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_of_birth' => 'nullable|date',
            'neighborhood_id' => ['required', 'exists:neighborhoods,id'],
            'violence_type_id' => ['required', 'exists:violence_types,id'],
            'perpetrator_id' => ['nullable', 'exists:perpetrators,id'],
            'period_of_violence_act' => ['nullable', 'string'],
            'violence_incident_location_id' => ['nullable', 'exists:violence_incident_locations,id'],
            'supposed_reason_of_violence_id' => ['nullable', 'exists:supposed_reason_of_violences,id'],
            'violence_details' => ['nullable', 'string'],
            'contact' => 'nullable|string',
            'requires_forwards' => 'nullable|boolean',
            'forward_to_organization' => 'nullable|required_if:requires_forwards,true|exists:organizations,id',
            'is_violence_caused_death' => 'boolean',
        ];
    }
    public function __invoke(Request $request)
    {
        $data = $request->validate($this->rules());


        \DB::beginTransaction();
        try {
            $code  = incrementCode();

            $victim = Victim::create([
                'name' => $data['name'],
                'age' => $data['age'],
                'date_of_birth' => $data['date_of_birth'],
                'neighborhood_id' => $data['neighborhood_id'],
                'violence_type_id' => $data['violence_type_id'],
                'violence_details' => $data['violence_details'],
                'contact' => $data['contact'],
            ]);


          $case  =   VictimCase::create([
                'victim_id' => $victim->id,
                'organization_id' => organization()->id,
                'case_registered_by_id' => auth()->user()->id,
                'progress_status' =>  CaseProgressStatus::IN_PROGRESS,
                'violence_details' => $victim->violence_details,
                'case_updated_by_id' => auth()->user()->id,
                'violence_type_id' => $victim->violence_type_id,
                'perpetrator_id' => $data['perpetrator_id'],
                'period_of_violence_act' => $data['period_of_violence_act'],
                'violence_incident_location_id' => $data['violence_incident_location_id'],
                'supposed_reason_of_violence_id' => $data['supposed_reason_of_violence_id'],
                'is_violence_caused_death' => $data['is_violence_caused_death'],
                'is_terminated' => false,
                'case_code' => $code
            ]);

            if ($data['requires_forwards']) {
                $case->refresh();
                $case->update([
                    'forwarded_to_organization_id' => $data['forward_to_organization'],
                ]);
            }

            \DB::commit();
            flash()->addSuccess('Case registado com sucesso');

        } catch (\Exception $e) {

            #throw  $e;
            \DB::rollBack();
            flash()->addError('Erro ao registar caso');
        }
        return redirect()->back();
    }
}
