<script lang="ts" setup>
import Modal from "@/components/Modal.vue";
import { PropType, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/components/InputError.vue";

const addDeathCause = ref(false);
const nameInput = ref();
const descriptionInput = ref();

const addDeathCauseTrigger = () => {
    addDeathCause.value = true;
};

const closeCreateDeathCauseModal = () => {
    addDeathCause.value = false;
    form.reset();
};

const form = useForm({
    name: "",
    description: "",
});

const createDeathCause = () => {
    form.post(route("deathCause.store"), {
        preserveScroll: true,
        onSuccess: () => closeCreateDeathCauseModal(),
        onError: () => nameInput.value.focus(),
    });
};
</script>
<template>
    <button
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
        type="button"
        @click="addDeathCauseTrigger"
    >
        <svg
            height="20"
            viewBox="0 0 24 24"
            width="20"
            xmlns="http://www.w3.org/2000/svg"
        >
            <circle
                cx="7.5"
                cy="6.5"
                fill="currentColor"
                opacity=".35"
                r="3.5"
            />
            <circle
                cx="16.5"
                cy="6.5"
                fill="currentColor"
                opacity=".35"
                r="3.5"
            />
            <path
                d="M10.5,14h8c1.93,0,3.5,1.57,3.5,3.5S20.43,21,18.5,21h-8V14z"
                fill="currentColor"
                opacity=".35"
            />
            <path
                d="M14,17.5c0,1.93-1.57,3.5-3.5,3.5h-5c-0.96,0-1.84-0.39-2.47-1.03C2.39,19.34,2,18.46,2,17.5C2,15.57,3.57,14,5.5,14h5c0.96,0,1.84,0.39,2.47,1.03C13.61,15.66,14,16.54,14,17.5z"
                fill="currentColor"
            />
        </svg>
        <span class="mx-4">Adicionar causa de morte</span>
    </button>

    <Modal :show="addDeathCause" @close="closeCreateDeathCauseModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                type="button"
                @click="closeCreateDeathCauseModal"
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
                    Causa de Óbito
                </h3>
                <form class="space-y-6" @submit.prevent="createDeathCause">
                    <div class="grid grid-cols-1 gap-2">
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                                >  Causa de Óbito
                            </label>
                            <input
                                id="name"
                                ref="nameInput"
                                v-model="form.name"
                                name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Causa de Óbito"
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
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
