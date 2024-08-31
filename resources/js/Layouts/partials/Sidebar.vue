<script setup lang="ts">
import { ref } from "vue";
import { useSidebar } from "@/composables/useSidebar";
import { Link, usePage } from "@inertiajs/vue3";
import logo from "@images/logo.png";
import WebsiteMessageLink from "@/Layouts/partials/WebsiteMessageLink.vue";
import Config from "@/Layouts/partials/Links/Config.vue";
import { Roles } from "@/types/generated";

const { isOpen } = useSidebar();
const activeClass = ref(
    "bg-gray-900  text-gray-100 border-l-white border-l-2 rounded-l-none",
);
const inactiveClass = ref(
    "border-gray-900 text-gray-100 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100",
);
const role = usePage().props.role;
const onlyAdmins = (role: Roles) => [Roles.ADMIN,Roles.SUPER_ADMIN].includes(role);
const onlyWriter = (role: Roles) => [Roles.SUPER_ADMIN,Roles.WRITER].includes(role);
const onlyFocalPoint =  (role : Roles) => [Roles.SUPER_ADMIN , Roles.ADMIN,Roles.FOCAL_POINT ].includes(role);
</script>

<template>
    <div class="flex">
        <!-- Backdrop -->
        <div
            :class="isOpen ? 'block' : 'hidden'"
            class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"
            @click="isOpen = false"
        />
        <!-- End Backdrop -->

        <div
            :class="
                isOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'
            "
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-slate-800 dark:bg-gray-800 lg:translate-x-0 lg:static lg:inset-0"
        >
            <div class="flex items-start justify-start mt-8 ml-3">
                <a href="/" class="flex items-center">
                    <img :src="logo" class="w-12 rounded-full" alt="logo" />
                    <span class="text-white text-lg font-medium mx-2"
                        >Ofeminicídio</span
                    >
                </a>
            </div>

            <nav class="mt-10">
                <Link
                    v-if="onlyWriter(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :href="route('article.create')"
                    :class="[
                        route().current('article.create')
                            ? activeClass
                            : inactiveClass,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            d="M16,7 L19,7 L19,11 L16,11 L16,7 Z M9,15 L20,15 M9,11 L13,11 M9,7 L13,7 M6,18.5 C6,19.8807119 4.88071187,21 3.5,21 C2.11928813,21 1,19.8807119 1,18.5 L1,7 L6.02493781,7 M6,18.5 L6,3 L23,3 L23,18.5 C23,19.8807119 21.8807119,21 20.5,21 L3.5,21"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-sm">Criar post</span>
                </Link>
                <Link
                    v-if="onlyWriter(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :href="route('article.list')"
                    :class="[
                        route().current('article.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            d="M16,7 L19,7 L19,11 L16,11 L16,7 Z M9,15 L20,15 M9,11 L13,11 M9,7 L13,7 M6,18.5 C6,19.8807119 4.88071187,21 3.5,21 C2.11928813,21 1,19.8807119 1,18.5 L1,7 L6.02493781,7 M6,18.5 L6,3 L23,3 L23,18.5 C23,19.8807119 21.8807119,21 20.5,21 L3.5,21"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-sm">Postagens</span>
                </Link>
                <Link
                    v-if="route().current('article.edit') && onlyWriter(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    href=""
                    :class="[
                        route().current('article.edit')
                            ? activeClass
                            : inactiveClass,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            d="M16,7 L19,7 L19,11 L16,11 L16,7 Z M9,15 L20,15 M9,11 L13,11 M9,7 L13,7 M6,18.5 C6,19.8807119 4.88071187,21 3.5,21 C2.11928813,21 1,19.8807119 1,18.5 L1,7 L6.02493781,7 M6,18.5 L6,3 L23,3 L23,18.5 C23,19.8807119 21.8807119,21 20.5,21 L3.5,21"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-sm">Editar post</span>
                </Link>
                <WebsiteMessageLink v-if="onlyAdmins(role)" />
                <Link
                    v-if="onlyFocalPoint(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :href="route('dashboard.reports')"
                    :class="[
                        route().current('dashboard.reports')
                            ? activeClass
                            : inactiveClass,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                    >
                        <!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zM160 224c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm128-64V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V160c0-17.7 14.3-32 32-32s32 14.3 32 32zm64 32c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V224c0-17.7 14.3-32 32-32zM480 96V320c0 17.7-14.3 32-32 32s-32-14.3-32-32V96c0-17.7 14.3-32 32-32s32 14.3 32 32z"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-sm">Estatísticas</span>
                </Link>
                <Link
                    v-if="onlyFocalPoint(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('victim.create')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('victim.create')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 18"
                    >
                        <g>
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.559Z"
                            ></path>
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"
                            ></path>
                        </g>
                    </svg>

                    <span class="mx-4 font-medium text-sm">Registo</span>
                </Link>
                <Link
                    v-if="(route().current('victim.edit') || route().current('victim.case.info')) && onlyFocalPoint(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    href=""
                    :class="activeClass"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1792 1792"
                        fill="currentColor"
                    >
                        <path
                            d="M1280 1056c0 53-43 96-96 96-32 0-62-16-80-43L877 768h-45v132l247 411c6 10 9 21 9 33 0 35-29 64-64 64H832v272c0 62-50 112-112 112H560c-61 0-112-50-112-112v-272H256c-35 0-64-29-64-64 0-12 3-23 9-33l247-411V768h-45l-227 341c-18 27-48 43-80 43-53 0-96-43-96-96 0-19 6-38 16-53l256-384c40-59 102-107 176-107h384c74 0 136 48 176 107l256 384c10 15 16 34 16 53zM864 256c0 124-100 224-224 224S416 380 416 256 516 32 640 32s224 100 224 224z"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-sm">Vítima</span>
                </Link>
                <Link
                    v-if="onlyFocalPoint(role)"
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :href="route('victim.cases.list')"
                    :class="[
                        route().current('victim.cases.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M17.38 10.38v3.23c0 2.69-1.08 3.77-3.77 3.77h-3.23c-2.69 0-3.77-1.08-3.77-3.77v-3.23c0-2.69 1.08-3.77 3.77-3.77h3.23c2.7.01 3.77 1.08 3.77 3.77z"
                        ></path>
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M22 5.77V9c0 2.69-1.08 3.77-3.77 3.77h-.85v-2.38c0-2.69-1.08-3.77-3.77-3.77h-2.38v-.85C11.23 3.08 12.31 2 15 2h3.23C20.92 2 22 3.08 22 5.77zM2 18.23V15c0-2.69 1.08-3.77 3.77-3.77h.85v2.38c0 2.69 1.08 3.77 3.77 3.77h2.38v.85C12.77 20.92 11.69 22 9 22H5.77C3.08 22 2 20.92 2 18.23z"
                            opacity=".4"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-sm">Casos</span>
                </Link>
                <Config v-if="onlyAdmins(role)" />
            </nav>
        </div>
    </div>
</template>
