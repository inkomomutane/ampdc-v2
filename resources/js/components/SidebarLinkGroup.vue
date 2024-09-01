<template>
    <li
        :class="
            isDropdownOpen
                ? 'bg-slate-900 ' + classOptions
                : classOptions +
                  'border-gray-900 text-gray-100 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100'
        "
        class="list-none items-center px-4 py-2.5 mx-3 duration-200 rounded-sm"
        @click="toggleDropdown"
    >
        <div class="flex truncate text-slate-200 transition duration-150">
            <span>
                <slot name="title"></slot>
            </span>
            <svg
                :class="{ 'rotate-180': isDropdownOpen }"
                class="ml-auto h-4 w-4 transform transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M19 9l-7 7-7-7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                ></path>
            </svg>
        </div>
        <!-- Dropdown Content -->
        <div v-if="isDropdownOpen" class="pl-2">
            <slot name="content" />
        </div>
    </li>
</template>

<script lang="ts" setup>
import { ref } from "vue";

const props = defineProps({
    classOptions: String,
    dropdownOpenState: Boolean,
});
const isDropdownOpen = ref(props.dropdownOpenState ?? false);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};
</script>
