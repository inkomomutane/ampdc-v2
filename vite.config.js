import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.ts",
                "resources/website/js/app.js",
                "resources/js/splide.ts",
                "resources/website/css/gtranslator.css",
                "resources/website/css/app.css",
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/js",
            "@images": "/resources/images",
            "@components": "/resources/js/components",
            "@composables": "/resources/js/composables",
            "@website": "/resources/website",
        },
    },
});
