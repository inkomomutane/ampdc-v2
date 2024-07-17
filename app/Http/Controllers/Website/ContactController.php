<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Website.Pages.contact',[
            'seoData' => new SEOData(
                title: 'Contactos',
                description: 'Contactos do Observatório do feminicídio',
                image: null,
                url: route('contact'),
                articleBody: 'Contactos do Observatório do feminicídio',
                section: 'Contact',
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
