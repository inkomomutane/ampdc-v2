<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputError from "@components/InputError.vue";
import { PropType, watch } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher, { progressCasesColor } from "@/helprs";
import NeighborhoodData = App.Data.NeighborhoodData;
import ViolenceTypeData = App.Data.ViolenceTypeData;

const props = defineProps({
    neighborhoods: {
        type: Array<App.Data.NeighborhoodData>,
        required: true,
    },
    violenceTypes: {
        type: Array<App.Data.ViolenceTypeData>,
        required: true,
    },
    organizations: {
        type: Array<App.Data.OrganizationData>,
        required: true,
    },
    messages: {
        type: Object as PropType<FlasherResponse>,
        required: false,
    },
    victimCase: {
        type: Object as PropType<App.Data.VictimCaseData>,
        required: true,
    },
    caseOnOtherOrganizations: {
        type: Array<App.Data.VictimCaseData>,
        required: true,
    },
});

const form = useForm({
    name: props.victimCase?.victim.name,
    age: props.victimCase?.victim.age,
    date_of_birth: "",
    neighborhood_id: props.victimCase?.victim.neighborhood.id,
    violence_type_id: props.victimCase?.violenceType.id,
    violence_details: props.victimCase?.violenceDetails,
    contact: props.victimCase?.victim.contact,
    requires_forwards: true,
    status: props.victimCase?.progressStatus,
});

watch(
    () => props.messages,
    (value) => {
        value?.envelopes.forEach((element) => {
            Flasher.flash(
                element.notification.type,
                element.notification.message,
            );
        });
    },
);
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="pb-12 flex-col gap-4">
                <div class="max-w-7xl mx-auto p-4 bg-white">
                    <div class="p-4 bg-slate-100 rounded">
                        <h1
                            class="text-xl font-semibold text-gray-900 dark:text-white"
                        >
                            Dados do caso :
                            <strong>{{ props.victimCase.caseCode }}</strong>
                        </h1>
                        <p class="text-sm text-gray-900 dark:text-white">
                            Dados da vítima e detalhes do processo do caso
                        </p>
                    </div>
                </div>
                <div class="max-w-7xl mx-auto p-6 lg:p-8 bg-white">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="col-span-2 grid md:grid-cols-3 gap-4">
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="name"
                                    >Nome da vítima
                                </label>
                                <input
                                    id="name"
                                    ref="nameInput"
                                    v-model="form.name"
                                    name="name"
                                    :disabled="true"
                                    class="disabled bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Nome da vítima"
                                    type="text"
                                />
                                <InputError :message="form.errors.name" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="age"
                                    >Idade</label
                                >
                                <input
                                    id="age"
                                    ref="ageInput"
                                    v-model="form.age"
                                    name="age"
                                    :disabled="true"
                                    class="disabled bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Idade"
                                    type="text"
                                />
                                <InputError :message="form.errors.age" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="contact"
                                    >Contacto</label
                                >
                                <input
                                    id="contact"
                                    ref="contactInput"
                                    v-model="form.contact"
                                    name="contact"
                                    :disabled="true"
                                    class="disabled bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Contacto"
                                    type="text"
                                />
                                <InputError :message="form.errors.contact" />
                            </div>
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="neighborhood_id"
                                >Bairro</label
                            >
                            <v-select
                                v-model="form.neighborhood_id"
                                :get-option-label="
                                    (option: NeighborhoodData) => option.name
                                "
                                :disabled="true"
                                :options="neighborhoods"
                                placeholder="Bairro"
                                :reduce="(unit: NeighborhoodData) => unit.id"
                                label="neighborhood_id"
                            ></v-select>
                            <InputError
                                :message="form.errors.neighborhood_id"
                            />
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="violence_type_id"
                                >Causa da morte</label
                            >
                            <v-select
                                v-model="form.violence_type_id"
                                :get-option-label="
                                    (option: ViolenceTypeData) => option.name
                                "
                                :disabled="true"
                                :options="violenceTypes"
                                placeholder="Causa da morte"
                                :reduce="(unit: ViolenceTypeData) => unit.id"
                                label="violence_type_id"
                            ></v-select>
                            <InputError
                                :message="form.errors.violence_type_id"
                            />
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                                >Organização encarregada
                            </label>
                            <input
                                id="name"
                                ref="nameInput"
                                :value="props.victimCase.organization.name"
                                name="name"
                                :disabled="true"
                                class="disabled bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Nome da vítima"
                                type="text"
                            />
                            <InputError :message="form.errors.name" />
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="age"
                                >Estado do caso</label
                            >
                            <input
                                id="age"
                                ref="ageInput"
                                :value="props.victimCase.progressStatus"
                                name="age"
                                :disabled="true"
                                class="disabled text-sm block w-full p-2.5 border-none text-white font-semibold"
                                :class="
                                    progressCasesColor(
                                        props.victimCase.progressStatus,
                                    )
                                "
                                placeholder="Idade"
                                type="text"
                            />
                            <InputError :message="form.errors.age" />
                        </div>
                        <div class="col-span-2">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="violence_details"
                                >Detalhes da violência</label
                            >
                            <textarea
                                id="violence_details"
                                ref="violenceDetailsInput"
                                v-model="form.violence_details"
                                :disabled="true"
                                class="disabled bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                name="violence_details"
                                placeholder="Detalhes da violência"
                                rows="4"
                            >
                            </textarea>
                            <InputError
                                :message="form.errors.violence_details"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
