<?php

namespace App\Http\Controllers\WebsiteMessage;

use App\Models\WebsiteMessage;

class DeleteWebsiteMessageController
{
    public function __invoke(WebsiteMessage $message)
    {
        try {
            $message->delete();
            flash()->addSuccess('Mensagem deletada com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao deletar mensagem!');
        }
        return back();
    }
}
