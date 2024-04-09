<script setup lang="ts">
import { ref } from "vue";
import { useSidebar } from "@/composables/useSidebar";
import { Link } from "@inertiajs/vue3";
import logo from "@images/logo.png";

const { isOpen } = useSidebar();
const activeClass = ref("bg-gray-900  text-gray-100 ");
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
                    <span class="text-white text-2xl font-bold mx-2">SISB</span>
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

                    <span class="mx-4 font-bold text-base">Dashboard</span>
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

                    <span class="mx-4 font-bold text-base">Organizações</span>
                </Link>
            </nav>
        </div>
    </div>
</template>
