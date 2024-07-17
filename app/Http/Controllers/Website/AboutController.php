<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Website.Pages.about',[
            'seoData' => new SEOData(
                title: 'Sobre',
                description: 'Sobre o Observatório do feminicídio',
                image: null,
                url: route('about.us'),
                articleBody: 'Sobre o Observatório do feminicídio',
                section: 'About',
                schema: null,
                type: 'website',
                site_name: 'Observatório do feminicídio',
                favicon: asset('favicon.ico'),
                locale: 'pt',
                openGraphTitle: 'Observatório do feminicídio',
            )
        ]);
    }
}
