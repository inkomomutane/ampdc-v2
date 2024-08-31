<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { PropType, ref, watch } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";
import { Articles } from "./types/index.d.ts";
import ResponsiveImage from "@components/ResponsiveImage.vue";

const props = defineProps({
    articles: {
        type: Object as PropType<Articles>,
        required: true,
    },
    messages: Object as PropType<FlasherResponse>,
});

watch(
    () => props.messages,
    (value) => {
        value?.envelopes.forEach((element) => {
            Flasher.flash(
                element.notification.type,
                element.notification.message,
            );
        });
    },
    {
        deep: true,
        immediate: true,
    },
);
const links = ref(props.articles.links);
watch(
    () => props.articles.links,
    (value) => {
        links.value = value;
    },
);
const articleSearch = ref("");
const searchProgress = ref(false);
watch(
    () => articleSearch,
    (value) => {
        router.visit(
            route("article.list", {
                search: value.value,
            }),
            {
                only: ["search", "articles"],
                preserveScroll: true,
                preserveState: true,
                onStart: (event) => {
                    searchProgress.value = true;
                },
                onProgress: (event) => {
                    searchProgress.value = true;
                },
                onFinish: (event) => {
                    console.log("searched");
                    searchProgress.value = false;
                },
            },
        );
    },
    {
        deep: true,
    },
);
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="mx-auto">
                <!-- Start coding here 0 -->
                <div>
                    <main
                        class="py-6 px-4 sm:p-6 md:py-4 md:px-8 grid grid-cols-3 gap-8"
                    >
                        <div class="w-full col-span-3">
                            <input
                                name="article"
                                type="text"
                                v-model="articleSearch"
                                class="h-14 w-full pr-8 pl-5 z-0 focus:outline-none shadow-2xl bg-zinc-50 border-2 border-zinc-900 text-red-900 focus:ring-2 focus:ring-red-600 focus:border-transparent"
                                placeholder="Pesquisar post..."
                            />
                        </div>
                        <Link
                            :href="
                                route('article.edit', {
                                    article: article.slug,
                                })
                            "
                            v-for="article in articles.data"
                        >
                            <article
                                class="!w-full rounded-b-xl bg-white dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-none hover:shadow-gray-400"
                            >
                                <header class="">
                                    <ResponsiveImage
                                        :responsive="article.cover ?? undefined"
                                        class-name="col-span-1 sm:col-span-3 h-72 sm:h-40 md:h-64 object-cover  w-full"
                                    />
                                </header>

                                <div
                                    class="w-full p-4 pb-6 grid justify-items-stretch col-span-3"
                                >
                                    <div class="flex justify-between">
                                        <h1
                                            class="text-lg text-red-600 font-semibold py-1 line-clamp-1"
                                        >
                                            {{ article.title }}
                                        </h1>
                                    </div>
                                    <div class="pb-3">
                                        <div
                                            class="line-clamp-2 text-sm"
                                            v-html="article.content"
                                        ></div>
                                    </div>

                                    <div
                                        class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                                        itemprop="address"
                                        itemscope
                                        itemtype="https://schema.org/PostalAddress"
                                    >
                                        <svg
                                            class="text-gray-400"
                                            width="20"
                                            height="20"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                        >
                                            <circle
                                                cx="12"
                                                cy="10"
                                                r="3"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></circle>
                                            <path
                                                d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></path>
                                        </svg>
                                        <p class="line-clamp-1">
                                            &nbsp;
                                            {{ article.location ?? "" }}
                                        </p>
                                    </div>
                                    <div class="flex gap-2 mt-2 font-black">
                                        <div
                                            :class="{
                                                'bg-red-600':
                                                    article.status !==
                                                    'published',
                                                'bg-green-600':
                                                    article.status ===
                                                    'published',
                                            }"
                                            class="flex text-center font-['Roboto'] text-gray-50 p-1 px-2"
                                        >
                                            <small class="font-black uppercase">
                                                {{ article.status }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </Link>
                    </main>
                </div>
                <nav
                    class="sm:rounded my-1 flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation"
                >
                    <span
                        class="text-sm font-normal text-red-500 dark:text-red-400"
                    >
                        Mostrando
                        <span
                            class="font-semibold text-red-900 dark:text-white"
                            >{{
                                `${articles.meta.from ?? 0}-${
                                    articles.meta.to ?? 0
                                }`
                            }}</span
                        >
                        de
                        <span
                            class="font-semibold text-red-900 dark:text-white"
                        >
                            {{ articles.meta.total }}</span
                        >
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li
                            v-if="links[0].active"
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                        >
                            <Link
                                href=""
                                class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                                >&laquo; Anterior
                            </Link>
                        </li>
                        <li v-else>
                            <Link
                                class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                                :href="links[0].url ?? ''"
                                >&laquo; Anterior
                            </Link>
                        </li>
                        <li
                            v-for="link in links.slice(1, -1)"
                            :key="link.label"
                        >
                            <Link
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                                v-if="!link.active"
                                :href="link.url ?? ''"
                                >{{ link.label }}
                            </Link>
                            <span
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 border border-red-300 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                                v-else
                                :class="`${
                                    link.active
                                        ? 'bg-red-700 dark:bg-slate-600 text-white dark:text-slate-100'
                                        : ''
                                }`"
                                >{{ link.label }}</span
                            >
                        </li>
                        <li
                            v-if="links.slice(-1)[0].active"
                            class="disabled flex items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white rounded-r-lg border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                        >
                            <span
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white rounded-r-lg border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                                >Próximo &raquo;</span
                            >
                        </li>
                        <li
                            v-else
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-red-500 bg-white rounded-r-lg border border-red-300 hover:bg-red-100 hover:text-red-700 dark:bg-red-800 dark:border-red-700 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-white"
                        >
                            <Link :href="links.slice(-1)[0].url ?? ''"
                                >Próximo &raquo;</Link
                            >
                        </li>
                    </ul>
                </nav>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
