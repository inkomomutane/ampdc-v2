<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

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
           'seoData' => new SEOData(
                title: 'Actividades e/ou notícias recentes',
                description: 'Actividades recentes do ' . 'Observatorio do feminicídio', image: null,
                url: route('news'),
                articleBody:'Actividades recentes do observatorio do feminicídio',
                section: 'News',
                schema: null,
                type: 'website',
                site_name: 'Observatorio do feminicídio',
                favicon: asset('favicon.ico'),
                locale: 'pt',
                openGraphTitle: 'Observatorio do feminicídio',
           )
       ]);
    }
}
