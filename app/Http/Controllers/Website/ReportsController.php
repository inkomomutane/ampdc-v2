<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Reports\ReportByAgeRange;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ReportsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Website.Pages.reports',[
            'seoData' => new SEOData(
                title: 'Relatórios',
                description: 'Relatórios do Observatório do feminicídio',
                image: null,
                url: route('reports'),
                articleBody: 'Relatórios do Observatório do feminicídio',
                section: 'Reports',
                schema: null,
                type: 'website',
                site_name: 'Observatório do feminicídio',
                favicon: asset('favicon.ico'),
                locale: 'pt',
                openGraphTitle: 'Observatório do feminicídio',
            ),
            'report_by_age' => ReportByAgeRange::handle()
        ]);
    }
}
