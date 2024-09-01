<script lang="ts" setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    active: Boolean,
    authorized: Boolean,
    href: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
});

const activeCss = "  bg-slate-800 text-slate-50 border-l border-l-white";
const inactiveCss = " hover:bg-gray-700 text-slate-50";
const unauthorizedCss = " bg-slate-700 text-slate-50";
</script>

<template>
    <Link
        v-if="authorized"
        :class="active ? activeCss : inactiveCss"
        :href="href"
        class="block px-2 py-2.5"
    >
        <div class="flex grow items-center">
            <slot name="icon"></slot>
            <span
                class="ml-1 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100"
                >{{ title }}</span
            >
        </div>
    </Link>

    <div
        v-else
        :class="unauthorizedCss"
        class="my-2 block cursor-default px-2 py-1"
    >
        <div class="flex grow items-center">
            <slot name="icon"></slot>
            <span
                class="ml-2 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100"
                >{{ title }}</span
            >
        </div>
    </div>
</template>
