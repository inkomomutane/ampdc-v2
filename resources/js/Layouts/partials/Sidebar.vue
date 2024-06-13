<script setup lang="ts">
import { ref } from "vue";
import { useSidebar } from "@/composables/useSidebar";
import { Link } from "@inertiajs/vue3";
import logo from "@images/logo.png";

const { isOpen } = useSidebar();
const activeClass = ref(
    "bg-gray-900  text-gray-100 border-l-white border-l-2 rounded-l-none",
);
const inactiveClass = ref(
    "border-gray-900 text-gray-100 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100",
);
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
                <Link href="/" class="flex items-center">
                    <img :src="logo" class="w-12" />
                    <span class="text-white text-2xl font-medium mx-2"
                        >DBF</span
                    >
                </Link>
            </div>

            <nav class="mt-10">
                <Link
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
                    <span class="mx-4 font-medium text-base">Estatísticas</span>
                </Link>
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('victim.register')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('victim.register')"
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

                    <span class="mx-4 font-medium text-base">Registo</span>
                </Link>
                <Link
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
                    <span class="mx-4 font-medium text-base">Casos</span>
                </Link>
                <Link
                     v-if="route().current('victim.case.edit') ||route().current('victim.case.info') "
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    href=""
                    :class="activeClass"
                >
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="currentColor"><path d="M1280 1056c0 53-43 96-96 96-32 0-62-16-80-43L877 768h-45v132l247 411c6 10 9 21 9 33 0 35-29 64-64 64H832v272c0 62-50 112-112 112H560c-61 0-112-50-112-112v-272H256c-35 0-64-29-64-64 0-12 3-23 9-33l247-411V768h-45l-227 341c-18 27-48 43-80 43-53 0-96-43-96-96 0-19 6-38 16-53l256-384c40-59 102-107 176-107h384c74 0 136 48 176 107l256 384c10 15 16 34 16 53zM864 256c0 124-100 224-224 224S416 380 416 256 516 32 640 32s224 100 224 224z"></path></svg>
                    <span class="mx-4 font-medium text-base">Caso</span>
                </Link>

                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :href="route('victim.forwarded.cases.list')"
                    :class="[
                        route().current('victim.forwarded.cases.list')
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
                    <span class="mx-4 font-medium text-base"
                        >Encaminhamento</span
                    >
                </Link>
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :href="route('victim.received.cases.list')"
                    :class="[
                        route().current('victim.received.cases.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            d="M21.25 5.77V9c0 2.29-.73 3.02-3.02 3.02h-.1v-1.64c0-3.12-1.39-4.51-4.51-4.51h-1.64v-.1c0-2.29.73-3.02 3.02-3.02h3.23c2.29 0 3.02.73 3.02 3.02z"
                            opacity=".4"
                        ></path>
                        <path
                            d="M16.63 10.38v3.24c0 2.28-.73 3.01-3.01 3.01h-3.24c-2.28 0-3.01-.73-3.01-3.01v-3.24c0-2.28.73-3.01 3.01-3.01h3.24c2.28 0 3.01.73 3.01 3.01z"
                        ></path>
                        <path
                            d="M12.02 18.13v.1c0 2.29-.73 3.02-3.02 3.02H5.77c-2.29 0-3.02-.73-3.02-3.02V15c0-2.29.73-3.02 3.02-3.02h.1v1.64c0 3.12 1.39 4.51 4.51 4.51h1.64z"
                            opacity=".4"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-base">Recebidos</span>
                </Link>



                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('violenceType.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('violenceType.list')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.47.22A.75.75 0 015 0h6a.75.75 0 01.53.22l4.25 4.25c.141.14.22.331.22.53v6a.75.75 0 01-.22.53l-4.25 4.25A.75.75 0 0111 16H5a.75.75 0 01-.53-.22L.22 11.53A.75.75 0 010 11V5a.75.75 0 01.22-.53L4.47.22zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5H5.31zM8 4a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 018 4zm0 8a1 1 0 100-2 1 1 0 000 2z"
                        ></path>
                    </svg>

                    <span class="mx-4 font-medium text-base"
                        >Tipo de Violência</span
                    >
                </Link>
                
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('deathCause.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('deathCause.list')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.47.22A.75.75 0 015 0h6a.75.75 0 01.53.22l4.25 4.25c.141.14.22.331.22.53v6a.75.75 0 01-.22.53l-4.25 4.25A.75.75 0 0111 16H5a.75.75 0 01-.53-.22L.22 11.53A.75.75 0 010 11V5a.75.75 0 01.22-.53L4.47.22zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5H5.31zM8 4a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 018 4zm0 8a1 1 0 100-2 1 1 0 000 2z"
                        ></path>
                    </svg>

                    <span class="mx-4 font-medium text-base"
                        >Causas de Ónito</span
                    >
                </Link>
                
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('user.all')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('user.all')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            cx="7.5"
                            cy="6.5"
                            r="3.5"
                            opacity=".35"
                            fill="currentColor"
                        ></circle>
                        <circle
                            cx="16.5"
                            cy="6.5"
                            r="3.5"
                            opacity=".35"
                            fill="currentColor"
                        ></circle>
                        <path
                            d="M10.5,14h8c1.93,0,3.5,1.57,3.5,3.5S20.43,21,18.5,21h-8V14z"
                            opacity=".35"
                            fill="currentColor"
                        ></path>
                        <path
                            d="M14,17.5c0,1.93-1.57,3.5-3.5,3.5h-5c-0.96,0-1.84-0.39-2.47-1.03C2.39,19.34,2,18.46,2,17.5C2,15.57,3.57,14,5.5,14h5c0.96,0,1.84,0.39,2.47,1.03C13.61,15.66,14,16.54,14,17.5z"
                            fill="currentColor"
                        ></path>
                    </svg>

                    <span class="mx-4 font-medium text-base">Usuários</span>
                </Link>
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('organization.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('organization.list')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        version="1.1"
                        viewBox="0 0 36 36"
                        preserveAspectRatio="xMidYMid meet"
                        fill="currentColor"
                    >
                        <title>organization-solid</title>
                        <polygon
                            points="9.8 18.8 26.2 18.8 26.2 21.88 27.8 21.88 27.8 17.2 18.8 17.2 18.8 14 17.2 14 17.2 17.2 8.2 17.2 8.2 21.88 9.8 21.88 9.8 18.8"
                            class="clr-i-solid clr-i-solid-path-1"
                        ></polygon>
                        <rect
                            x="2"
                            y="23"
                            width="14"
                            height="10"
                            rx="2"
                            ry="2"
                            class="clr-i-solid clr-i-solid-path-2"
                        ></rect>
                        <rect
                            x="20"
                            y="23"
                            width="14"
                            height="10"
                            rx="2"
                            ry="2"
                            class="clr-i-solid clr-i-solid-path-3"
                        ></rect>
                        <rect
                            x="11"
                            y="3"
                            width="14"
                            height="10"
                            rx="2"
                            ry="2"
                            class="clr-i-solid clr-i-solid-path-4"
                        ></rect>
                        <rect
                            x="0"
                            y="0"
                            width="36"
                            height="36"
                            fill-opacity="0"
                        ></rect>
                    </svg>

                    <span class="mx-4 font-medium text-base">Organizações</span>
                </Link>
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('province.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('province.list')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                    >
                        <path
                            d="M12 1.99609C12.4142 1.99609 12.75 2.33188 12.75 2.74609V3.99939H14.75C15.7165 3.99939 16.5 4.78289 16.5 5.74939V10.9994H18.75C19.7165 10.9994 20.5 11.7829 20.5 12.7494V20.2494C20.5 21.2159 19.7165 21.9994 18.75 21.9994H9.75452L9.75 21.9994H5.25C4.2835 21.9994 3.5 21.2159 3.5 20.2494V11.82C3.5 11.2011 3.82689 10.6283 4.35972 10.3134L7.5 8.45776V5.74939C7.5 4.78289 8.2835 3.99939 9.25 3.99939H11.25V2.74609C11.25 2.33188 11.5858 1.99609 12 1.99609ZM9 8.01784C9.8097 8.13784 10.5 8.82442 10.5 9.75181V20.4994H13.5V12.7494C13.5 11.8678 14.1519 11.1384 15 11.0171V5.74939C15 5.61132 14.8881 5.49939 14.75 5.49939H12.0094L12 5.49945L11.9906 5.49939H9.25C9.11193 5.49939 9 5.61132 9 5.74939V8.01784ZM15.25 12.4994C15.1119 12.4994 15 12.6113 15 12.7494V20.4994H18.75C18.8881 20.4994 19 20.3875 19 20.2494V12.7494C19 12.6113 18.8881 12.4994 18.75 12.4994H15.25ZM8.62282 9.53658L5.12282 11.6048C5.0467 11.6498 5 11.7316 5 11.82V20.2494C5 20.3875 5.11193 20.4994 5.25 20.4994H9V9.75181C9 9.55824 8.78947 9.4381 8.62282 9.53658Z"
                            fill="currentColor"
                        ></path>
                    </svg>

                    <span class="mx-4 font-medium text-base">Províncias</span>
                </Link>
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('district.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('district.list')"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                    >
                        <path
                            d="M12 1.99609C12.4142 1.99609 12.75 2.33188 12.75 2.74609V3.99939H14.75C15.7165 3.99939 16.5 4.78289 16.5 5.74939V10.9994H18.75C19.7165 10.9994 20.5 11.7829 20.5 12.7494V20.2494C20.5 21.2159 19.7165 21.9994 18.75 21.9994H9.75452L9.75 21.9994H5.25C4.2835 21.9994 3.5 21.2159 3.5 20.2494V11.82C3.5 11.2011 3.82689 10.6283 4.35972 10.3134L7.5 8.45776V5.74939C7.5 4.78289 8.2835 3.99939 9.25 3.99939H11.25V2.74609C11.25 2.33188 11.5858 1.99609 12 1.99609ZM9 8.01784C9.8097 8.13784 10.5 8.82442 10.5 9.75181V20.4994H13.5V12.7494C13.5 11.8678 14.1519 11.1384 15 11.0171V5.74939C15 5.61132 14.8881 5.49939 14.75 5.49939H12.0094L12 5.49945L11.9906 5.49939H9.25C9.11193 5.49939 9 5.61132 9 5.74939V8.01784ZM15.25 12.4994C15.1119 12.4994 15 12.6113 15 12.7494V20.4994H18.75C18.8881 20.4994 19 20.3875 19 20.2494V12.7494C19 12.6113 18.8881 12.4994 18.75 12.4994H15.25ZM8.62282 9.53658L5.12282 11.6048C5.0467 11.6498 5 11.7316 5 11.82V20.2494C5 20.3875 5.11193 20.4994 5.25 20.4994H9V9.75181C9 9.55824 8.78947 9.4381 8.62282 9.53658Z"
                            fill="currentColor"
                        ></path>
                    </svg>

                    <span class="mx-4 font-medium text-base">Distritos</span>
                </Link>
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('neighborhood.list')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('neighborhood.list')"
                >
                    <svg
                        class="w-5 h-5"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M9 19H12V12.9416L8 9.45402L4 12.9416V19H7V15H9V19ZM21 21H3C2.44772 21 2 20.5523 2 20V12.4868C2 12.1978 2.12501 11.9229 2.34282 11.733L6 8.54435V4C6 3.44772 6.44772 3 7 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21ZM16 11V13H18V11H16ZM16 15V17H18V15H16ZM16 7V9H18V7H16ZM12 7V9H14V7H12Z"
                        ></path>
                    </svg>
                    <span class="mx-4 font-medium text-base">Bairros</span>
                </Link>
                <!--                -->
            </nav>
        </div>
    </div>
</template>
