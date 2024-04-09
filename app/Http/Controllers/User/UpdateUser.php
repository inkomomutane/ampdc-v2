<?php

namespace App\Http\Controllers\User;


use App\Models\User;
use Illuminate\Validation\Rule;
use Throwable;

class UpdateUser
{


    public function __invoke(User $user)
    {
        $validated = request()?->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', Rule::unique(User::class, 'email')->ignore($user->id, 'id')],
            'contact' => ['nullable', 'string'],
            'role' => ['required', 'exists:roles,id'],
        ]);

        try {
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->contact = $validated['contact'];
            $user->syncRoles($validated['role'])
                ->save();

            flash()->addSuccess('Usuário actualizado com sucesso.');
        } catch (Throwable $th) {

            throw $th;
            flash()->addError('Erro na actualização do usuário.');
        }

        return \redirect()->back();
    }
}
