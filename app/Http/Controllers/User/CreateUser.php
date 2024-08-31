<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\concerns\AuthorizeAdmins;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Models\Role;

class CreateUser
{

    use AuthorizeAdmins;

    public function handle(array $userData): User
    {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'contact' => $userData['contact'],
            'password' => Hash::make('12345678'),
            'organization_id' => $userData['organization_id'],
        ]);
        /** @var User $user */
        $user = User::whereId($user->id)->first();
        $user->assignRole(Role::findById($userData['role']));
        return $user;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'contact' => ['nullable', 'string'],
            'role' => ['required', 'exists:roles,id'],
            'organization_id' => 'required|exists:organizations,id'
        ];
    }

    public function __invoke(Request $request)
    {
        try {
            $this->handle($request->validate($this->rules()));
            flash()->addSuccess('Usuário criado com sucesso.');
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError('Erro ao criar usuário.');
        }

        return \redirect()->back();
    }
}
