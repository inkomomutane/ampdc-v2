<?php

namespace App\Http\Controllers\Victim;

use App\Enums\CivilState;
use App\Enums\EducationLevel;
use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Models\Victim;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateVictimDataController extends Controller
{
    public function rules(): array
    {

        return [
            'name' => 'nullable|string',
            'age' => 'nullable|integer',
            'gender' => ['required',Rule::in(Gender::getValues())],
            'civil_state' => ['nullable', Rule::in(CivilState::getValues())],
            'contact' => 'nullable|string',
            'profession' => 'nullable|string',
            'education_level' => ['nullable', Rule::in(EducationLevel::getValues())],
            'contact_alternative' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'city' => 'nullable|string',
            'neighborhood' => 'nullable|string',
            'address' => 'nullable|string'
        ];
    }

    /**
     * @throws Exception
     */
    public function __invoke(Victim $victim,Request $request)
    {
        $data = $request->validate($this->rules());

        DB::beginTransaction();
        try {
            $victim->update($data);
            DB::commit();
            flash()->addSuccess('Dados da vítima actualizados com sucesso');
        } catch (Exception $e) {
            DB::rollBack();
            flash()->addError('Erro ao actualizar dados da vítima');
            throw  $e;
        }
        return redirect()->back();
    }
}
