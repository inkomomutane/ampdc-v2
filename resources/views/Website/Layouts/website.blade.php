<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield("title", "Observatório de feminicidio")</title>
        @yield("seo")
        @routes
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />
        <!-- Scripts -->
        @vite(["resources/website/js/app.ts", "resources/website/css/app.css"])
        @vite(["resources/website/js/splide.ts", "resources/website/css/gtranslator.css"])
    </head>
    <body
        class="font-sans antialiased scroll-smooth selection:bg-red-500/90 selection:text-white"
    >
        <!--==================== Preloader Start ====================-->
        <div
            id="preloader"
            class="fixed inset-0 flex items-center justify-center z-40 w-full bg-red-400/75 backdrop-blur-3xl"
        >
            <div
                class="animate-spin rounded-full h-32 w-32 border-t-8 border-b border-t-red-600 border-b-purple-600 bg-white"
            ></div>
            <img
                src="{{ Vite::asset("resources/website/images/logo.png") }}"
                class="w-24 h-20 absolute rounded-full"
                alt=""
            />
        </div>

        <div id="fb-root"></div>
        <script
            async
            defer
            crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0"
            nonce="k7U0J6Iw"
        ></script>
        <!--==================== Preloader End ====================-->
        @include("Website.partials.navbar")
        @yield("content")
        @include("Website.partials.footer")
        @stack("scripts")
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('preloader').style.display = 'none';
            });
        </script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    {
                        pageLanguage: 'pt',
                        includedLanguages: 'pt,es,fr,en',
                        layout: google.translate.TranslateElement.InlineLayout
                            .SIMPLE,
                        multilanguagePage: true,
                        gaTrack: true,
                    },
                    'google_translate_element',
                );
            }
        </script>
        <script
            type="text/javascript"
            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
        ></script>
        <script type="text/javascript" lang="ts">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    {
                        pageLanguage: 'pt',
                        includedLanguages: 'es,fr,en,pt,da,nl,nl-b',
                        layout: google.translate.TranslateElement.InlineLayout
                            .SIMPLE,
                        multilanguagePage: true,
                        gaTrack: true,
                    },
                    'google_translate_element',
                );
            }
        </script>
    </body>
</html>
