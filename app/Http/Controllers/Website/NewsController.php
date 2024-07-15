<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $article = Article::latest('posted_at')->first();
       return  view('Website.Pages.news',[
           'article' => $article,
           'articles' => Article::whereNot('id', $article?->id)
               ->orderByDesc('posted_at')
               ->paginate(6),
       ]);
    }
}
