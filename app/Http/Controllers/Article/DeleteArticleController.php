<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use DB;
use Exception;

class DeleteArticleController
{
    /**
     * @throws Exception
     */
    public  function __invoke(Article $article)
    {
     try {
         DB::beginTransaction();
         $article->delete();
         DB::commit();
         flash()->addSuccess('Post excluído com sucesso');
     }catch (Exception $e){
         DB::rollBack();
         flash()->addError('Erro ao excluído post');
         throw $e;
     }

        return to_route('article.list');
    }
}
