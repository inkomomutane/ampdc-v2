<script setup lang="ts">
import Sidebar from "@/Layouts/partials/Sidebar.vue";
import Header from "@/Layouts/partials/Header.vue";
import { computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";

const insertBetween = (items: any, insertion: any) => {
    return items.flatMap((value: any, index: number, array: Array<any>) =>
        array.length - 1 !== index ? [value, insertion] : value,
    );
};

const breadcrumbs = computed(() =>
    insertBetween(usePage().props.breadcrumbs || [], "/"),
);
</script>

<template>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900 font-roboto">
        <Sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <Header />

            <main
                class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900"
            >
                <div class="container mx-auto px-6">
                    <div class="max-w-7xl mx-auto py-4">
                        <nav
                            v-if="breadcrumbs"
                            class="mt-6 py-3 w-fit inline-flex rounded-md"
                        >
                            <ol class="flex">
                                <li v-for="page in breadcrumbs">
                                    <div>
                                        <span v-if="page === '/'"
                                            ><svg
                                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g>
                                                    <path
                                                        d="M0 0h24v24H0z"
                                                        fill="none"
                                                    ></path>
                                                    <path
                                                        d="M12.172 12L9.343 9.172l1.414-1.415L15 12l-4.243 4.243-1.414-1.415z"
                                                    ></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <Link
                                            v-else
                                            :class="{
                                                'text-slate-700 dark:text-slate-100 bg-slate-200 dark:bg-slate-700 p-3 py-2 rounded-sm':
                                                    !page.current,
                                                'text-slate-900 dark:text-slate-100 bg-white dark:bg-slate-800  p-3 py-2 rounded-sm border border-slate-200 dark:border-slate-800 ':
                                                    page.current,
                                            }"
                                            :href="page.url"
                                            >{{ page.title }}
                                        </Link>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <slot name="content" />
                </div>
            </main>
        </div>
    </div>
</template>
