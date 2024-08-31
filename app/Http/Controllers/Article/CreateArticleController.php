<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\concerns\AuthorizeWriters;
use Inertia\Inertia;

class CreateArticleController
{
    use AuthorizeWriters;

    public function __invoke()
    {
        $this->authorizeAction();
        return Inertia::render('Website/CreateArticle');
    }
}
