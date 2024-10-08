<script setup lang="ts">
import Modal from "@/components/Modal.vue";
import { useForm } from "@inertiajs/vue3";
import { PropType, ref } from "vue";
import { DistrictData, ProvinceData } from "@/types/generated";

const props = defineProps({
    district: {
        type: Object as PropType<DistrictData>,
        required: true,
    },
    close: {
        type: Function,
        required: true,
    },
    provinces: {
        type: Array<ProvinceData>,
        required: true,
    },
    openModal: {
        type: Boolean,
        required: true,
    },
});

const nomeInput = ref<String | any>(props.district.name);

const form = useForm({
    id: props.district.id,
    name: props.district.name,
    province_id: props.district.province?.id,
});

const updateDistrict = () => {
    form.patch(
        route("district.update", {
            district: props.district.id,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                props.close();
            },
            onError: () => nomeInput.value.focus(),
            onFinish: () => form.reset(),
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
                <h3
                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Editar distrito
                </h3>
                <form class="space-y-6" @submit.prevent="updateDistrict">
                    <div>
                        <label
                            for="nome"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Nome</label
                        >
                        <input
                            type="text"
                            name="name"
                            v-model="form.name"
                            ref="nomeInput"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nome do districto"
                        />
                        <span class="text-medium text-red-500 font-medium">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div>
                        <label
                            for="provincia"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Província</label
                        >

                        <v-select
                            v-model="form.province_id"
                            :get-option-label="
                                (option: ProvinceData) => option.name
                            "
                            :options="provinces"
                            placeholder="Selecionar província"
                            :reduce="(province: ProvinceData) => province.id"
                            label="district_id"
                        ></v-select>

                        <span class="text-sm text-red-500 font-normal">{{
                            form.errors.province_id
                        }}</span>
                    </div>
                    <button
                        type="submit"
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
