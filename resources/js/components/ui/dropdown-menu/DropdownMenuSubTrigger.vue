<script setup lang="ts">
import {
    DropdownMenuSubTrigger,
    type DropdownMenuSubTriggerProps,
} from "radix-vue";
import { ChevronRightIcon } from "@radix-icons/vue";
import { cn } from "@/lib/utils";

const props = defineProps<DropdownMenuSubTriggerProps & { class?: string }>();
</script>

<template>
    <DropdownMenuSubTrigger
        v-bind="props"
        :class="[
            cn(
                'flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none focus:bg-slate-100 data-[state=open]:bg-slate-100 dark:focus:bg-slate-800 dark:data-[state=open]:bg-slate-800',
                props.class,
            ),
        ]"
    >
        <slot />
        <ChevronRightIcon class="ml-auto h-4 w-4" />
    </DropdownMenuSubTrigger>
</template>
