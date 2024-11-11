<script setup lang="ts">
import Modal from "@/components/Modal.vue";
import { useForm } from "@inertiajs/vue3";
import { PropType, ref } from "vue";
import InputError from "@components/InputError.vue";
import { OrganizationData, RoleData, UserData } from "@/types/generated";

const props = defineProps({
    case: {
        type: String,
        required: true,
    },
    organizations: {
        type: Array<OrganizationData>,
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
    id: props.case,
    organization_id: null,
});
const organizationInput = ref();
const forwardCase = () => {
    form.post(
        route("forward.case.to", {
            case: props.case,
            organization: form.organization_id,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                props.close();
            },
            onError: () => organizationInput.value.focus(),
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
                    Encaminhamento do caso.
                </h3>
                <form class="space-y-6" @submit.prevent="forwardCase">


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

                        <div class="md:col-span-2">
                            <label
                                for="organization"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Organização que ira receber o caso</label
                            >
                            <v-select
                                v-model="form.organization_id"
                                :get-option-label="
                                    (option: OrganizationData) => option.name
                                "
                                :options="organizations"
                                placeholder="Organização que ira receber o caso"
                                :reduce="
                                    (organization: OrganizationData) =>
                                        organization.id
                                "
                                label="organization"
                            ></v-select>
                            <InputError
                                :message="form.errors.organization_id"
                            />
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        Encaminhar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
