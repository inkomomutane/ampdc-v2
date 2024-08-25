import { PageProps as InertiaPageProps } from "@inertiajs/core";
import { AxiosInstance } from "axios";
import { route as routFn } from "ziggy-js";
import { PageProps as AppPageProps } from "./";

declare global {
    interface Window {
        axios: AxiosInstance;
        ApexCharts: ApexCharts;
        route: typeof routFn;
    }

    let route: typeof routFn;
}

declare module "vue" {
    interface ComponentCustomProperties {
        route: typeof routFn;
    }
}

declare module "@inertiajs/core" {
    interface PageProps extends InertiaPageProps, AppPageProps {}
}
