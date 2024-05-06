import "./bootstrap";
import "../css/app.css";

import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import VueSelect from "vs-vue3-select";
import VueApexCharts from "vue3-apexcharts";
import "vs-vue3-select/dist/vs-vue3-select.css";
import "@/components/select/select.css";

import.meta.glob(["../images/**", "../fonts/**"]);
const appName = import.meta.env.VITE_APP_NAME || "Donations";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueApexCharts)
            .component("v-select", VueSelect)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
