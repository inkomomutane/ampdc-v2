<script setup lang="ts">
import { ref } from "vue";
import { useSidebar } from "@/composables/useSidebar";
import { Link } from "@inertiajs/vue3";
import logo from "@images/logo.png";

const { isOpen } = useSidebar();
const activeClass = ref("bg-gray-900  text-gray-100 border-l-white border-l-2 rounded-l-none");
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
                    <span class="text-white text-2xl font-medium mx-2">VBG</span>
                </Link>
            </div>

            <nav class="mt-10">
                <Link
                    class="flex items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
                    :class="[
                        route().current('dashboard')
                            ? activeClass
                            : inactiveClass,
                    ]"
                    :href="route('dashboard')"
                >
                    <svg
                        class="w-5 h-5"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M2 10C2 5.58172 5.58172 2 10 2V10H18C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10Z"
                            fill="currentColor"
                        />
                        <path
                            d="M12 2.25195C14.8113 2.97552 17.0245 5.18877 17.748 8.00004H12V2.25195Z"
                            fill="currentColor"
                        />
                    </svg>

                    <span class="mx-4 font-medium text-base">Dashboard</span>
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
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="7.5" cy="6.5" r="3.5" opacity=".35" fill="currentColor"></circle><circle cx="16.5" cy="6.5" r="3.5" opacity=".35" fill="currentColor"></circle><path d="M10.5,14h8c1.93,0,3.5,1.57,3.5,3.5S20.43,21,18.5,21h-8V14z" opacity=".35" fill="currentColor"></path><path d="M14,17.5c0,1.93-1.57,3.5-3.5,3.5h-5c-0.96,0-1.84-0.39-2.47-1.03C2.39,19.34,2,18.46,2,17.5C2,15.57,3.57,14,5.5,14h5c0.96,0,1.84,0.39,2.47,1.03C13.61,15.66,14,16.54,14,17.5z" fill="currentColor"></path></svg>

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
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" fill="currentColor"><title>organization-solid</title><polygon points="9.8 18.8 26.2 18.8 26.2 21.88 27.8 21.88 27.8 17.2 18.8 17.2 18.8 14 17.2 14 17.2 17.2 8.2 17.2 8.2 21.88 9.8 21.88 9.8 18.8" class="clr-i-solid clr-i-solid-path-1"></polygon><rect x="2" y="23" width="14" height="10" rx="2" ry="2" class="clr-i-solid clr-i-solid-path-2"></rect><rect x="20" y="23" width="14" height="10" rx="2" ry="2" class="clr-i-solid clr-i-solid-path-3"></rect><rect x="11" y="3" width="14" height="10" rx="2" ry="2" class="clr-i-solid clr-i-solid-path-4"></rect><rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect></svg>

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
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M12 1.99609C12.4142 1.99609 12.75 2.33188 12.75 2.74609V3.99939H14.75C15.7165 3.99939 16.5 4.78289 16.5 5.74939V10.9994H18.75C19.7165 10.9994 20.5 11.7829 20.5 12.7494V20.2494C20.5 21.2159 19.7165 21.9994 18.75 21.9994H9.75452L9.75 21.9994H5.25C4.2835 21.9994 3.5 21.2159 3.5 20.2494V11.82C3.5 11.2011 3.82689 10.6283 4.35972 10.3134L7.5 8.45776V5.74939C7.5 4.78289 8.2835 3.99939 9.25 3.99939H11.25V2.74609C11.25 2.33188 11.5858 1.99609 12 1.99609ZM9 8.01784C9.8097 8.13784 10.5 8.82442 10.5 9.75181V20.4994H13.5V12.7494C13.5 11.8678 14.1519 11.1384 15 11.0171V5.74939C15 5.61132 14.8881 5.49939 14.75 5.49939H12.0094L12 5.49945L11.9906 5.49939H9.25C9.11193 5.49939 9 5.61132 9 5.74939V8.01784ZM15.25 12.4994C15.1119 12.4994 15 12.6113 15 12.7494V20.4994H18.75C18.8881 20.4994 19 20.3875 19 20.2494V12.7494C19 12.6113 18.8881 12.4994 18.75 12.4994H15.25ZM8.62282 9.53658L5.12282 11.6048C5.0467 11.6498 5 11.7316 5 11.82V20.2494C5 20.3875 5.11193 20.4994 5.25 20.4994H9V9.75181C9 9.55824 8.78947 9.4381 8.62282 9.53658Z" fill="currentColor"></path></svg>

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
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M12 1.99609C12.4142 1.99609 12.75 2.33188 12.75 2.74609V3.99939H14.75C15.7165 3.99939 16.5 4.78289 16.5 5.74939V10.9994H18.75C19.7165 10.9994 20.5 11.7829 20.5 12.7494V20.2494C20.5 21.2159 19.7165 21.9994 18.75 21.9994H9.75452L9.75 21.9994H5.25C4.2835 21.9994 3.5 21.2159 3.5 20.2494V11.82C3.5 11.2011 3.82689 10.6283 4.35972 10.3134L7.5 8.45776V5.74939C7.5 4.78289 8.2835 3.99939 9.25 3.99939H11.25V2.74609C11.25 2.33188 11.5858 1.99609 12 1.99609ZM9 8.01784C9.8097 8.13784 10.5 8.82442 10.5 9.75181V20.4994H13.5V12.7494C13.5 11.8678 14.1519 11.1384 15 11.0171V5.74939C15 5.61132 14.8881 5.49939 14.75 5.49939H12.0094L12 5.49945L11.9906 5.49939H9.25C9.11193 5.49939 9 5.61132 9 5.74939V8.01784ZM15.25 12.4994C15.1119 12.4994 15 12.6113 15 12.7494V20.4994H18.75C18.8881 20.4994 19 20.3875 19 20.2494V12.7494C19 12.6113 18.8881 12.4994 18.75 12.4994H15.25ZM8.62282 9.53658L5.12282 11.6048C5.0467 11.6498 5 11.7316 5 11.82V20.2494C5 20.3875 5.11193 20.4994 5.25 20.4994H9V9.75181C9 9.55824 8.78947 9.4381 8.62282 9.53658Z" fill="currentColor"></path></svg>


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
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M9 19H12V12.9416L8 9.45402L4 12.9416V19H7V15H9V19ZM21 21H3C2.44772 21 2 20.5523 2 20V12.4868C2 12.1978 2.12501 11.9229 2.34282 11.733L6 8.54435V4C6 3.44772 6.44772 3 7 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21ZM16 11V13H18V11H16ZM16 15V17H18V15H16ZM16 7V9H18V7H16ZM12 7V9H14V7H12Z"></path></svg>
                    <span class="mx-4 font-medium text-base">Bairros</span>
                </Link>
              <!--                -->
            </nav>
        </div>
    </div>
</template>
