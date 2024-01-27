<script lang="ts" setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";

defineProps({
    modules: Array<App.Data.StructuredCompanyModulePermissionData>,
});
const moduleRef = ref<App.Data.StructuredCompanyModulePermissionData | null>(
    null,
);

const onModuleClick = (module) => {
    axios
        .get(
            route("modules-module", {
                module: module.id,
            }),
        )
        .then((e) => {
            console.log(e);
            moduleRef.value = e.data;
        });
};
</script>

<template>
    <Head title="Usuários da empresa" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div
                class="px-4 sm:px-6 lg:px-8 pb-8 w-full max-w-9xl mx-auto space-y-4"
            >
                <div class="dark:bg-gray-800 relative">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-3 grid gap-4">
                            <div
                                v-for="module in modules"
                                class="rounded grid grid-cols-12 text-gray-600 m-0 cursor-pointer border border-gray-300 bg-white"
                                @click="onModuleClick(module)"
                            >
                                <div
                                    class="col-span-4 flex justify-content-center p-4 bg-slate-100 text-gray-600"
                                >
                                    <svg
                                        class="w-16"
                                        fill="none"
                                        viewBox="0 0 48 48"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            fill="white"
                                            fill-opacity="0.01"
                                            height="48"
                                            width="48"
                                        ></rect>
                                        <rect
                                            fill="currentColor"
                                            height="30"
                                            rx="2"
                                            stroke="currentColor"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            width="36"
                                            x="6"
                                            y="12"
                                        ></rect>
                                        <path
                                            d="M17.9498 24.0083L29.9498 24.0083"
                                            stroke="#fff"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        ></path>
                                        <path
                                            d="M6 13L13 5H35L42 13"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="col-span-8 flex p-4">
                                    <div class="">
                                        <strong class="text-xl font-bold">{{
                                            module.name
                                        }}</strong>
                                        <p class="line-clamp-3 text-xs">
                                            Terror observares, tanquam dexter
                                            frondator. Terror observares,
                                            tanquam dexter frondator. Terror
                                            observares, tanquam dexter
                                            frondator.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-9 bg-white">
                            {{ moduleRef }}
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
