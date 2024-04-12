<script setup lang="ts">

    import {PropType} from "vue";

    interface ValueData  {
        done:number,
        pending:number,
        total:number
    }
    const props = defineProps({
        label : {
            type: String,
            required:true
        },
        value : {
            type : Object as PropType<ValueData>,
            required : true
        }
    })


</script>

<template>
    <div class="bg-white dark:bg-gray-800">
        <div class="rounded-sm border-b border-gray-100 p-2.5 px-4">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-2">{{ label }}</h2>
        </div>
        <div class="p-4 dark:text-white grid grid-cols-2">
            <div class="flex flex-col gap-4">
                <div>
                     <span class="px-4 p-1 bg-slate-200 dark:bg-slate-600 font-medium">Não resolvidos: <strong>{{ value.pending }}</strong></span>
                </div>
                <div>
                    <span class="px-4 p-1 bg-green-200 dark:bg-slate-600  font-medium">Resolvidos : <strong>{{ value.done }}</strong></span>
                </div>
            </div>
            <div class="text-center  flex items-center justify-center">
                <span class="text-5xl font-semibold text-gray-700 dark:text-white">{{ value.total }}</span>
            </div>
        </div>
    </div>
</template>
