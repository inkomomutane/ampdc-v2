<?php

namespace App\Http\Controllers\Article;

use App\Data\ArticleData;
use App\Enums\Roles;
use App\Http\Controllers\concerns\AuthorizeWriters;
use App\Models\Article;
use Inertia\Inertia;

class EditArticleController
{
    use AuthorizeWriters;

    public function __invoke(Article $article){
        $this->authorizeAction();
        return Inertia::render('Website/EditArticle',[
            'article' => ArticleData::fromModel($article)
        ]);
    }
}
