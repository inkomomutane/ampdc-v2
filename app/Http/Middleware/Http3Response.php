<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Vite;

class Http3Response
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $jsArray = [
            Vite::asset('resources/website/js/app.ts'),
            Vite::asset('resources/website/js/splide.ts')
        ];
        $cssArray = [
            Vite::asset('resources/website/css/app.css'),
            Vite::asset('resources/website/css/gtranslator.css'),
            'https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap'
        ];

        foreach ($jsArray as $js) {
            $response->headers->set('Link', "<$js>; rel=preload; as=script", false);
        }
        foreach ($cssArray as $css) {
            $response->headers->set('Link', "<$css>; rel=preload; as=style", false);
        }

        if($request->routeIs('welcome')){
           // images
            $response->headers->set('Link', "<".Vite::asset('resources/website/images/observatorio.jpeg').">; rel=preload; as=image", false);
            # resources/website/images/violence.jpg
            $response->headers->set('Link', "<".Vite::asset('resources/website/images/violence.jpg').">; rel=preload; as=image", false);
            // js
            $response->headers->set('Link', "<".Vite::asset('resources/website/js/reports.ts').">; rel=preload; as=script", false);
        }

        $response->headers->set('Link', "<".Vite::asset('resources/website/images/logo.png').">; rel=preload; as=image", false);
       # $response->sendHeaders(103);
        return $next($request);
    }
}
