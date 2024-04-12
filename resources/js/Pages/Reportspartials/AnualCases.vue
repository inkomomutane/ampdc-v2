<script setup lang="ts">
import { Line } from 'vue-chartjs'
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    LineElement,
    CategoryScale,
    LinearScale,
    PointElement,
    Filler
} from 'chart.js'
import {PropType} from "vue";
import {ulid} from "ulidx";
const props = defineProps({
    chartData: {
        required: true,
        type:Array<number>
    },
})
ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale,PointElement,Filler)

const chartData = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    datasets: [
        {
            label: 'Casos',
            data: props.chartData,
            borderColor:[
                'rgba(54, 162, 235)',
            ],
            pointBackgroundColor: [

                'rgba(54, 162, 235, 0.9)',
            ],
           backgroundColor:  [
                'rgba(54, 162, 235, 0.2)',
           ],
            borderWidth: 1,
            fill: true,
            tension: 0.4,
            labelColor: 'rgba(54, 162, 235)',
        },

    ],

}
const chartOptions = {
    responsive: true,
    legend: {
        display: false
    },
    labels: {
        display: false
    },
    maintainAspectRatio: false,
    backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
    ],
    plugins: {
       filler: {
           propagate: true,
         },
    },
    scales: {
        x: {
            grid: {
                display: true,
            },
            ticks: {
                color: 'rgba(0,0,0,0.5)',
            },
        },
        y: {
            grid: {
                display: true,
            },
            ticks: {
                color: 'rgba(0,0,0,0.5)',
            },
        },
    }
}
</script>

<template>
   <div class="bg-white dark:bg-gray-800">
       <div class="rounded-sm border-b border-gray-100 p-2.5 px-4">
           <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-2">Casos anuais</h2>
       </div>
      <div class="p-4 h-72 dark:text-white">
          <Line
              :id="ulid()"
              :options="chartOptions"
              :data="chartData"
          />
      </div>
   </div>
</template>
