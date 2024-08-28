<script setup lang="ts">
defineProps<{
    modelValue: string|number|null|undefined;
}>();
</script>

<template>
    <input
        :value="modelValue"
        disabled
        class="bg-zinc-200 border cursor-not-allowed  border-gray-300 text-gray-900 text-sm rounded-sm
         focus:ring-slate-500 focus:border-slate-500
         block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500
         dark:placeholder-gray-400 dark:text-white
         first-letter:uppercase
         capitalize"
    />
</template>
