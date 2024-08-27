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

class RegisterVictimDataController extends Controller
{
    public function rules(): array
    {

        return [

            'name' => 'nullable|string', #done
            'age' => 'nullable|integer', #done
            'gender' => ['required',Rule::in(Gender::getValues())], #done
            'civil_state' => [Rule::in(CivilState::getValues())], #done
            'contact' => 'nullable|string', #done
            'profession' => 'nullable|string',
            'education_level' => ['required', Rule::in(EducationLevel::getValues())],
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
    public function __invoke(Request $request)
    {
        $data = $request->validate($this->rules());

        DB::beginTransaction();
        try {
           $victim =   Victim::create($data);
            DB::commit();
            flash()->addSuccess('Vítima registada com sucesso');

            return to_route('victim.case.create',[
                'victim' => $victim->id
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            flash()->addError('Erro ao registar vítima');
            throw  $e;
        }
        return redirect()->back();
    }
}
