<script setup lang="ts">
import Modal from "@/components/Modal.vue";
import { useForm } from "@inertiajs/vue3";
import { PropType } from "vue";
import { ViolenceIncidentLocationData } from "@/types/generated";

const props = defineProps({
    violenceIncidentLocation: {
        type: Object as PropType<ViolenceIncidentLocationData>,
        required: true,
    },
    close: {
        type: Function,
        required: true,
    },
    openModal: {
        type: Boolean,
        required: true,
    },
});

const form = useForm({
    id: props.violenceIncidentLocation.id,
});

const deleteViolenceIncidentLocation = () => {
    form.delete(
        route("violenceIncidentLocation.delete", {
            violenceIncidentLocation: props.violenceIncidentLocation.id,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                props.close();
            },
        },
    );
};
</script>
<template>
    <Modal :show="props.openModal" @close="props.close">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="props.close"
            >
                <svg
                    aria-hidden="true"
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="sr-only">Fechar</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h1 class="flex">Deseja excluir esse local de violência?</h1>
                <form
                    class="space-y-6"
                    @submit.prevent="deleteViolenceIncidentLocation"
                >
                    <button
                        type="submit"
                        class="w-full mt-8 text-white focus:ring-4 focus:outline-none font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-800 dark:focus:ring-slate-200 bg-red-500 hover:bg-red-600 focus:ring-red-300"
                    >
                        <span>Excluir esse local de violência.</span>
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
