import "./bootstrap";
import "../css/app.css";

import { createApp, h, DefineComponent, ref, onMounted } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import VueSelect from "vs-vue3-select";
import { ZiggyVue } from "ziggy-js";
import VueApexCharts from "vue3-apexcharts";
import "vs-vue3-select/dist/vs-vue3-select.css";
import PrimeVue from "primevue/config";
import "@/components/select/select.css";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import VueDatePicker from "@vuepic/vue-datepicker";
import "../css/datetime.css";
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
            .component("VueDatePicker", VueDatePicker)
            .component("QuillEditor", QuillEditor)
            .component("v-select", VueSelect)
            .use(PrimeVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
