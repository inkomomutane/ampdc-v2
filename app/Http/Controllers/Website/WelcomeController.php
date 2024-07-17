<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Website.Pages.welcome',[
            'articles' => Article::orderByDesc('posted_at')->limit(6)->get(),
            'seoData' => new SEOData(
                title: 'Observatorio do feminicídio',
                description: 'Resultado  de movimentos feministas em Moçambique em repúdio ao fenómeno da violência contra mulheres que nos últimos tempos passou a ser reconhecido como problema social que necessita de políticas públicas e envolvimento de diferentes sectores e seguimentos sociais para o seu enfrentamento. ',
                image: null,
                url: route('welcome'), articleBody: 'Resultado  de movimentos feministas em Moçambique em repúdio ao fenómeno da violência contra mulheres que nos últimos tempos passou a ser reconhecido como problema social que necessita de políticas públicas e envolvimento de diferentes sectores e seguimentos sociais para o seu enfrentamento. ',
                section: 'Welcome',
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
