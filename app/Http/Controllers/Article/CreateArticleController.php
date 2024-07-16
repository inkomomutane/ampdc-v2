<?php

namespace App\Http\Controllers\Article;

use Inertia\Inertia;

class CreateArticleController
{
    public function __invoke()
    {
        return Inertia::render('Website/CreateArticle');
    }
}
