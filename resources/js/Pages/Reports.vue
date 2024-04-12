<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
    casesCountArrayByYear: {
        required: true,
        type: Array<number>
    },
    casesCount : {
       type:Object
    },
    forwardedCasesCount : {
        type:Object
    },
    receivedCasesCount : {
        type:Object
    },
    causeOfDeath : {
        type:Object
    },
    neighborhoodDeaths : {
        type:Object
    }
});

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import AnualCases from "@/Pages/Reportspartials/AnualCases.vue";
import DashboardCardData from "@/Pages/Reportspartials/DashboardCardData.vue";
import DeathCauseChart from "@/Pages/Reportspartials/DeathCauseChart.vue";
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

</script>
<template>
    <Head title="Estatísticas" />
    <AuthenticatedLayout>
        <template v-slot:banner>
            <div class="mx-auto max-w-screen-xl">
                <!-- Start coding here -->
                <div
                    class="relative overflow-hidden"
                >
                    <div class=" max-w-screen-xl relative bg-indigo-200 dark:bg-indigo-500 p-4 sm:p-6 rounded-sm overflow-hidden ">

                        <!-- Background illustration -->
                        <div class="absolute right-0 top-0  pointer-events-none hidden xl:block" aria-hidden="true">
                            <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
                                    <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
                                    <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
                                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                                        <stop stop-color="#A5B4FC" offset="0%" />
                                        <stop stop-color="#818CF8" offset="100%" />
                                    </linearGradient>
                                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                                        <stop stop-color="#4338CA" offset="0%" />
                                        <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <g transform="rotate(64 36.592 105.604)">
                                        <mask id="welcome-d" fill="#fff">
                                            <use xlink:href="#welcome-a" />
                                        </mask>
                                        <use fill="url(#welcome-b)" xlink:href="#welcome-a" />
                                        <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
                                    </g>
                                    <g transform="rotate(-51 91.324 -105.372)">
                                        <mask id="welcome-f" fill="#fff">
                                            <use xlink:href="#welcome-e" />
                                        </mask>
                                        <use fill="url(#welcome-b)" xlink:href="#welcome-e" />
                                        <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
                                    </g>
                                    <g transform="rotate(44 61.546 392.623)">
                                        <mask id="welcome-h" fill="#fff">
                                            <use xlink:href="#welcome-g" />
                                        </mask>
                                        <use fill="url(#welcome-b)" xlink:href="#welcome-g" />
                                        <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <!-- Content -->
                        <div class="relative">
                            <h1 class="text-xl md:text-2xl text-slate-700 dark:text-slate-100 font-bold mb-1">
                                Estatísticas da base de dados
                            </h1>
                            <p class="dark:text-indigo-200 hidden">Here is what’s happening with your projects today:</p>
                        </div>

                    </div>
                </div>
            </div>

        </template>
        <template v-slot:content>
            <div class="mx-auto max-w-screen-xl mt-4" >
                <!-- Start coding here -->
                <div
                    class=" relative  overflow-hidden"
                >
                    <div class="grid gap-4 mb-6">
                        <AnualCases :chart-data="props.casesCountArrayByYear" />
                    </div>

                    <div class="grid sm:grid-cols-2  xl:grid-cols-3 my-6 gap-6">
                        <DashboardCardData :value="casesCount" label="Casos registados"/>
                        <DashboardCardData :value="forwardedCasesCount" label="Casos encaminhados"/>
                        <DashboardCardData :value="receivedCasesCount" label="Casos recebidos"/>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <DeathCauseChart label="Gráfico por causa da morte" :causes="causeOfDeath.labels"  :causes-count="causeOfDeath.values" />
                        <DeathCauseChart label="Gráfico por bor bairros" :causes="neighborhoodDeaths.labels"  :causes-count="neighborhoodDeaths.values" />
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
