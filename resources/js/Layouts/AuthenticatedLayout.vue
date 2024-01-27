<script setup lang="ts">
import Sidebar from "@/Layouts/partials/Sidebar.vue";
import Header from "@/Layouts/partials/Header.vue";
</script>

<template>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900 font-roboto">
        <Sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <Header />

            <main
                class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900"
            >
                <div class="container mx-auto px-6 py-8">
                    <slot name="content" />
                </div>
            </main>
        </div>
    </div>
</template>
