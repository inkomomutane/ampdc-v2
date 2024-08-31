<script lang="ts" setup>
import Modal from "@/components/Modal.vue";
import { PropType, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/components/InputError.vue";
import { ViolenceTypeData } from "@/types/generated";

const props = defineProps({
    violenceType: {
        type: Object as PropType<ViolenceTypeData>,
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

const nameInput = ref<any>(props.violenceType?.name);
const descriptionInput = ref<any>(props.violenceType?.description);

const form = useForm({
    id: props.violenceType?.id,
    name: props.violenceType?.name,
    description: props.violenceType?.description,
});

const createViolenceType = () => {
    form.patch(
        route("violenceType.update", {
            violenceType: props.violenceType.id,
        }),
        {
            preserveScroll: true,
            onSuccess: () => props.close(),
            onError: () => nameInput.value.focus(),
        },
    );
};
</script>
<template>
    <Modal :show="props.openModal" @close="props.close">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                type="button"
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
                        clip-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        fill-rule="evenodd"
                    ></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3
                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Editar causa de uma morte
                </h3>
                <form class="space-y-6" @submit.prevent="createViolenceType">
                    <div class="grid grid-cols-1 gap-2">
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >
                                Causa de uma morte</label
                            >
                            <input
                                id="name"
                                ref="nameInput"
                                v-model="form.name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                name="name"
                                placeholder="Causa de uma morte"
                                type="text"
                            />
                            <InputError :message="form.errors.name" />
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                                >Descrição</label
                            >
                            <textarea
                                id="description"
                                ref="descriptionInput"
                                v-model="form.description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                name="description"
                                placeholder="Descrição"
                                rows="4"
                            >
                            </textarea>
                            <InputError :message="form.errors.description" />
                        </div>
                    </div>
                    <button
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                        type="submit"
                    >
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
