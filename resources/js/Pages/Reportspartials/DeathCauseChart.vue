<script setup lang="ts">
import { ulid } from "ulidx";
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const props = defineProps({
    causes : {
        type: Array<string>,
        default : []
    },
    causesCount : {
        type: Array<any>,
        default : []
    },
    label : {
        type : String,
        default : ''
    }
})

const chartData = {
    labels: props.causes,
    datasets:[
        {
            label: 'Causa das mortes',
            data:props.causesCount,
            borderColor:[
                'rgba(54, 162, 235)',
            ],
            backgroundColor:  [
                'rgba(54, 162, 235, 0.6)',
            ],
        }
    ]
};
const chartOptions = {
    plugins: {
        filler: {
            propagate: true,
        },
    },
    scales: {
        y: {
            grid: {
                display: true,
            },
            ticks: {
                color: 'rgba(0,0,0,0.5)',
            }
        },
    }
};

</script>
<template>
    <div class="bg-white dark:bg-gray-800">
        <div class="rounded-sm border-b border-gray-100 p-2.5 px-4">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-2">{{ label }}</h2>
        </div>
        <div class="p-4 h-72 dark:text-white">
            <Bar
                :id="ulid()"
                :options="chartOptions"
                :data="chartData"
            />
        </div>
    </div>

</template>

