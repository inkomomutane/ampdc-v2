<script setup lang="ts">
import ApplicationLogo from "@/components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import logo from "@images/logo.png";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-300 dark:bg-gray-900"
    >
        <div>
            <Link href="/">
                <img :src="logo" class="w-32" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 p-8 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
