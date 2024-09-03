<?php

namespace App\Http\Controllers\Victim\Cases;

use App\Models\VictimCase;
use DB;
use Exception;

class DeleteVictimCase
{
    public function __invoke(VictimCase $case)
    {
        if ($this->handle($case)) {
            flash()->addSuccess('Caso de violência removido com sucesso.');
        } else {
            flash()->addError('Erro ao remover caso de violência.');
        }
    }


    public function handle(VictimCase $case): ?bool
    {
       try{
           DB::beginTransaction();
              $case->delete();
              DB::commit();
              return true;
       }catch (Exception $e){
              DB::rollBack();
              return false;
       }
    }
}
