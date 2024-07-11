<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>@yield("title", "Laravel")</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(["resources/website/js/app.ts", "resources/website/css/app.css"])
    </head>
    <body
        class="font-sans antialiased scroll-smooth selection:bg-red-500/90 selection:text-white"
    >
        @yield("content")
    </body>
</html>
