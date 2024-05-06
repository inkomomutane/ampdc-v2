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
        return [
            'name' => 'required|string',
            'age' => 'required|integer',
            'date_of_birth' => 'nullable|date',
            'neighborhood_id' => ['required', 'exists:neighborhoods,id'],
            'violence_type_id' => ['required', 'exists:violence_types,id'],
            'violence_details' => ['nullable', 'string'],
            'contact' => 'nullable|string',
            'requires_forwards' => 'nullable|boolean',
            'forward_to_organizations' => 'nullable|required_if:requires_forwards,true|array',
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

            if($request->input('required_forwards') === false || $request->input('required_forwards') === null) {
                VictimCase::create([
                    'victim_id' => $victim->id,
                    'organization_id' => organization()->id,
                    'case_registered_by_id' => auth()->user()->id,
                    'progress_status' =>  CaseProgressStatus::IN_PROGRESS,
                    'case_details' => $victim->violence_details,
                    'case_updated_by_id' => auth()->user()->id,
                    'violence_type_id' => $victim->violence_type_id,
                    'is_forwarded' => false,
                    'case_code' => $code
                ]);
            }

             $organizations = collect([]);

            if ($request->input('requires_forwards') && is_array($request->input('forward_to_organizations'))) {
                $organizations = Organization::whereIn('id', $request->input('forward_to_organizations'))->get();
            }

            event(new ForwardedCases(
                $victim,
                $organizations,
                $request->user(),
                $request->user(),
                auth()->user()->organization,
                $code
            ));

            \DB::commit();
            flash()->addSuccess('Case registado com sucesso');

        } catch (\Exception $e) {

            throw  $e;
            \DB::rollBack();
            flash()->addError('Erro ao registar caso');
        }
        return redirect()->back();
    }
}
