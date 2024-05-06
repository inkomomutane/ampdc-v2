<?php

namespace App\Http\Controllers\Victim;

use App\Enums\CaseProgressStatus;
use App\Http\Controllers\Controller;
use App\Models\VictimCase;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateDataOfVictimCaseController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(VictimCase $case, Request $request)
    {
        $validated = $request->validate($this->rules());
        DB::beginTransaction();
        try {
             $case->load('victim');

            $oldData = [
                'name' => $case->victim->name,
                'age' => $case->victim->age,
                'neighborhood_id' => $case->victim->neighborhood_id,
                'neighborhood' => $case->victim->neighborhood->name, // Add this line
                'violence_type_id' => $case->violence_type_id,
                'violence_type' => $case->violenceType->name, // Add this line
                'violence_details' => $case->violence_details,
                'contact' => $case->victim->contact,
                'status' => $case->progress_status,
            ];

            if(is_array($case->updated_fields) && count($case->updated_fields) > 0){
                $case->updated_fields  = array_merge($case->updated_fields,[$oldData]);
            }
            else{
                $case->updated_fields = [$oldData];
            }

            $case->victim->neighborhood_id = $validated['neighborhood_id'];
            $case->victim->name = $validated['name'];
            $case->victim->age = $validated['age'];
            $case->violence_type_id = $validated['violence_type_id'];
            $case->updated_fields = $validated['violence_details'];
            $case->victim->contact = $validated['contact'];
            $case->progress_status = $validated['status'];


            $case->save();

            $case->victim->save();
            DB::commit();
            flash()->addSuccess('Caso actualizado com sucesso');
        } catch (Exception $e) {
            DB::rollBack();
            flash()->addError('Erro ao actualizar caso');
            throw $e;
        }
        return redirect()->route('victim.case.edit',[
            'case' => $case->id
        ]);
    }

    public function rules() :array
    {
        return [
            'name' => 'required|string',
            'age' => 'required|integer',
            'neighborhood_id' => 'required|exists:neighborhoods,id',
            'violence_type_id' => 'required|exists:violence_types,id',
            'violence_details' => 'nullable|string',
            'contact' => 'nullable|string',
            'status' => ['required',Rule::enum(CaseProgressStatus::class)]
        ];
    }
}
