import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import * as path from "node:path";

export default defineConfig({
    build: {
        sourcemap: true,
    },
    plugins: [
        laravel({
            input: [
                "resources/js/app.ts",
                "resources/website/js/app.ts",
                "resources/website/js/splide.ts",
                "resources/website/js/reports.ts",
                "resources/website/js/lightbox.ts",
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
