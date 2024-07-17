<?php

namespace App\Http\Controllers\WebsiteMessage;

use App\Models\WebsiteMessage;
use DB;
use Illuminate\Http\Request;
use Mockery\Exception;

class WebsiteMessageRegisterController
{
    private function rules(): array
    {
        return [
            'name' => 'required|string',
            'message' => 'required|string',
            'email' => 'nullable|email',
            'contact' => 'nullable|string',
        ];
    }

    public function __invoke(Request $request)
    {
        try {
           DB::beginTransaction();
                $data = $request->validate($this->rules());
            WebsiteMessage::create($data);
            DB::commit();
            return to_route('contact')->with('message_success','Mensagem enviada com sucesso!');
        } catch (Exception) {
           DB::rollBack();
            return to_route('contact')->with('message_error','Erro ao enviar mensagem!');
        }
    }
}
