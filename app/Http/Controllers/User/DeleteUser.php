<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteUser
{

    public function handle(User $user, bool $status)
    {
        $user->active = $status;
        $user->save();
        return $user->active;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'boolean'],
        ];
    }

    public function __invoke(User $user, Request $request)
    {

        try {
            $status = $request->validate($this->rules())['status'];
            if ($this->handle($user,  $status)) {
                flash()->addSuccess('Usuário habilitado com sucesso.');
            } else {
                flash()->addSuccess('Usuário desabilitado com sucesso.');
            }
        } catch (\Throwable $th) {
            flash()->addError('Erro ao trocar o estado do usuario');
        }
        return \redirect()->back();
    }
}
