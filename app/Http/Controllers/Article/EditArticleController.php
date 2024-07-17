<?php

namespace App\Http\Controllers\Article;

use App\Data\ArticleData;
use App\Models\Article;
use Inertia\Inertia;

class EditArticleController
{
    public function __invoke(Article $article){
        return Inertia::render('Website/EditArticle',[
            'article' => ArticleData::fromModel($article)
        ]);
    }
}
