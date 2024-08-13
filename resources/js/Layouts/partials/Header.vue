<script setup lang="ts">
import { ref, watch, onMounted } from "vue";
import { useSidebar } from "@/composables/useSidebar";
import { Link, router } from "@inertiajs/vue3";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { Avatar } from "@components/ui/avatar";
import { usePage } from "@inertiajs/vue3";
const profile = usePage().props.auth.user;
const { isOpen } = useSidebar();

const darkMode = ref<Boolean>(false);

onMounted(() => changeMode(localStorage.getItem("dark-mode") === "true"));

watch(darkMode, () => {
    localStorage.setItem("dark-mode", `${darkMode.value}`);
    if (darkMode.value) {
        document.querySelector("body")?.classList.add("dark");
    } else {
        document.querySelector("body")?.classList.remove("dark");
    }
});

const changeMode = (dark: Boolean) => {
    darkMode.value = dark;
    if (dark) {
        document.querySelector("body")?.classList.add("dark");
        return true;
    } else {
        document.querySelector("body")?.classList.remove("dark");
        return false;
    }
};

const profileLink = () => router.get(route("profile.edit"));
const logout = () => window.open(route("logout"), "_self");
</script>

<template>
    <header
        class="flex items-center justify-between px-6 py-4 bg-white dark:bg-gray-800 border-b-4 border-indigo-600 dark:border-gray-400"
    >
        <div class="flex items-center">
            <button
                class="text-gray-500 dark:text-gray-50 focus:outline-none lg:hidden"
                @click="isOpen = true"
            >
                <svg
                    class="w-6 h-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M4 6H20M4 12H20M4 18H11"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>

            <div class="relative mx-4 lg:mx-0"></div>
        </div>

        <div class="flex items-center">
            <button
                class="flex mx-4 text-gray-600 focus:outline-none"
                @click="changeMode(!darkMode.valueOf())"
            >
                <svg
                    v-if="!darkMode"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="w-6 h-6"
                >
                    <path
                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                        class="fill-sky-400/20 stroke-sky-500"
                    ></path>
                    <path
                        d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"
                        class="stroke-sky-500"
                    ></path>
                </svg>
                <svg v-else viewBox="0 0 24 24" fill="none" class="w-6 h-6">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z"
                        class="fill-sky-400/20"
                    ></path>
                    <path
                        d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z"
                        class="fill-sky-500"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z"
                        class="fill-sky-500"
                    ></path>
                </svg>
            </button>
            <DropdownMenu>
                <DropdownMenuTrigger>
                    <div
                        class="rounded-full bg-slate-500 dark:bg-slate-900 p-2 text-gray-50"
                    >
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"
                            ></path>
                        </svg>
                    </div>
                </DropdownMenuTrigger>
                <DropdownMenuContent>
                    <DropdownMenuLabel>{{ profile.name }}</DropdownMenuLabel>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem @click="profileLink">
                        Perfil
                    </DropdownMenuItem>
                    <DropdownMenuItem @click="logout">Logout</DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    </header>
</template>
