<script setup lang="ts">
import { ulid } from "ulidx";
import { Bar } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";
ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
);

const props = defineProps({
    causes: {
        type: Array<string>,
        default: [],
    },
    causesCount: {
        type: Array<any>,
        default: [],
    },
    label: {
        type: String,
        default: "",
    },
});

const options = {
    xaxis: {
        categories: props.causes,
    },
};
const series = [
    {
        name: "Tipos de violência",
        data: props.causesCount,
    },
];
</script>
<template>
    <div class="bg-white dark:bg-gray-800">
        <div class="rounded-sm border-b border-gray-100 p-2.5 px-4">
            <h2
                class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-2"
            >
                {{ label }}
            </h2>
        </div>
        <div class="p-4 h-72 dark:text-white">
            <apexchart
                height="288px"
                type="bar"
                :options="options"
                :series="series"
            ></apexchart>
        </div>
    </div>
</template>
