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

const series = [{
    name: 'Casos',
    data: props.chartData,
}];

const options = {
    chart: {
        id: ulid(),
        toolbar: {
            autoSelected: "pan",
            show: false
        }
    },
    stroke: {
        curve: 'smooth',
    },
    grid: {
        clipMarkers: false,
        yaxis: {
            lines: {
                show: true
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        gradient: {
            enabled: true,
            opacityFrom: 0.55,
            opacityTo: 0
        }
    },
    markers: {
        size: 5,
        strokeWidth: 3
    },
    xaxis: {
        categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
    }
};
</script>

<template>
   <div class="bg-white dark:bg-gray-800">
       <div class="rounded-sm border-b border-gray-100 p-2.5 px-4">
           <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-2">Casos anuais</h2>
       </div>
      <div class="p-4 h-72 dark:text-white">
          <apexchart height="288px"  type="area" :options="options" :series="series"></apexchart>
      </div>
   </div>
</template>
