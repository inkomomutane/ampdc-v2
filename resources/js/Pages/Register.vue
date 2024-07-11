<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@components/InputError.vue";
import { PropType, watch } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";
import NeighborhoodData = App.Data.NeighborhoodData;
import ViolenceTypeData = App.Data.ViolenceTypeData;
import OrganizationData = App.Data.OrganizationData;
import {
    CivilState,
    Gender,
    getArrayFromEnum,
    KeyPair,
    PeriodOfViolenceAct,
} from "@/types/casestatus";

const props = defineProps({
    neighborhoods: {
        type: Array<App.Data.NeighborhoodData>,
        required: true,
    },
    perpetratorTypes: {
        type: Array<App.Data.BaseDataClass>,
        required: true,
    },
    violenceLocations: {
        type: Array<App.Data.BaseDataClass>,
        required: true,
    },
    supposedReasonsOfViolence: {
        type: Array<App.Data.BaseDataClass>,
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
});

const genderOptions = getArrayFromEnum(Gender);
const civilStateOptions = getArrayFromEnum(CivilState);
const periodOfViolenceActOptions = getArrayFromEnum(PeriodOfViolenceAct);

const form = useForm({
    name: "",
    age: "",
    gender: null,
    civil_state: null,
    neighborhood_id: null,
    contact: "",
    requires_forwards: false,
    violence_type_id: null,
    perpetrator_id: null,
    period_of_violence_act: null,
    violence_incident_location_id: null,
    supposed_reason_of_violence_id: null,
    violence_details: "",
    forward_to_organization: null,
    is_violence_caused_death: false,
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

const onCliqueRequiredForwards = () => {
    form.requires_forwards = !form.requires_forwards;
};
const onCliqueIsViolenceCausedDeath = () => {
    form.is_violence_caused_death = !form.is_violence_caused_death;
};

const registerCase = () => {
    form.post(route("victim.register.case"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>
<template>
    <Head title="Registar no caso" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="pb-12">
                <div class="max-w-7xl mx-auto p-4 bg-white">
                    <div class="p-4 bg-slate-100 rounded">
                        <h1
                            class="text-2xl font-semibold text-gray-900 dark:text-white"
                        >
                            Registar novo caso de violência
                        </h1>
                        <p class="text-sm text-gray-900 dark:text-white">
                            Preencha o formulário abaixo para registar um caso
                            de violência.
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Idade"
                                    type="text"
                                />
                                <InputError :message="form.errors.age" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="gender"
                                    >Gênero</label
                                >
                                <v-select
                                    v-model="form.gender"
                                    placeholder="Gênero"
                                    :get-option-label="
                                        (option: KeyPair) => option.value
                                    "
                                    :reduce="(unit: KeyPair) => unit.key"
                                    :options="genderOptions"
                                ></v-select>
                                <InputError :message="form.errors.gender" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="civil_state"
                                    >Estado cívil</label
                                >
                                <v-select
                                    v-model="form.civil_state"
                                    :get-option-label="
                                        (option: KeyPair) => option.value
                                    "
                                    :reduce="(unit: KeyPair) => unit.key"
                                    placeholder="Estado cívil"
                                    :options="civilStateOptions"
                                ></v-select>
                                <InputError
                                    :message="form.errors.civil_state"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="contact"
                                    >Contacto do parente/pessoa próxima</label
                                >
                                <input
                                    id="contact"
                                    ref="contactInput"
                                    v-model="form.contact"
                                    name="contact"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Contacto do parente/pessoa próxima"
                                    type="text"
                                />
                                <InputError :message="form.errors.contact" />
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
                                        (option: NeighborhoodData) =>
                                            option.name
                                    "
                                    :options="neighborhoods"
                                    placeholder="Bairro"
                                    :reduce="
                                        (unit: NeighborhoodData) => unit.id
                                    "
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
                                    >Tipo de violência</label
                                >
                                <v-select
                                    v-model="form.violence_type_id"
                                    :get-option-label="
                                        (option: ViolenceTypeData) =>
                                            option.name
                                    "
                                    :options="violenceTypes"
                                    placeholder="Tipo de violência"
                                    :reduce="
                                        (unit: ViolenceTypeData) => unit.id
                                    "
                                    label="violence_type_id"
                                ></v-select>
                                <InputError
                                    :message="form.errors.violence_type_id"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="perpetrator_id"
                                    >Perpetrador</label
                                >
                                <v-select
                                    v-model="form.perpetrator_id"
                                    :get-option-label="
                                        (option: App.Data.BaseDataClass) =>
                                            option.name
                                    "
                                    :options="perpetratorTypes"
                                    placeholder="Perpetrador"
                                    :reduce="
                                        (perpetrator: App.Data.BaseDataClass) =>
                                            perpetrator.id
                                    "
                                    label="perpetrator_id"
                                ></v-select>
                                <InputError
                                    :message="form.errors.perpetrator_id"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="period_of_violence_act"
                                    >Período que ocorreu a violência</label
                                >
                                <v-select
                                    v-model="form.period_of_violence_act"
                                    placeholder="Período que ocorreu a violência"
                                    :get-option-label="
                                        (option: KeyPair) => option.value
                                    "
                                    :reduce="(unit: KeyPair) => unit.key"
                                    :options="periodOfViolenceActOptions"
                                ></v-select>
                                <InputError
                                    :message="
                                        form.errors.period_of_violence_act
                                    "
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="violence_incident_location_id"
                                >Local onde ocorreu a violência</label
                            >
                            <v-select
                                v-model="form.violence_incident_location_id"
                                :get-option-label="
                                    (
                                        violence_incident_location: App.Data.BaseDataClass,
                                    ) => violence_incident_location.name
                                "
                                :options="violenceLocations"
                                placeholder="Local onde ocorreu a violência"
                                :reduce="
                                    (
                                        violence_incident_location: App.Data.BaseDataClass,
                                    ) => violence_incident_location.id
                                "
                                label="violence_incident_location_id"
                            ></v-select>
                            <InputError
                                :message="
                                    form.errors.violence_incident_location_id
                                "
                            />
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="supposed_reason_of_violence_id"
                                >Suposto motivo da violência</label
                            >
                            <v-select
                                v-model="form.supposed_reason_of_violence_id"
                                :get-option-label="
                                    (
                                        violence_incident_location: App.Data.BaseDataClass,
                                    ) => violence_incident_location.name
                                "
                                :options="supposedReasonsOfViolence"
                                placeholder="Suposto motivo da violência"
                                :reduce="
                                    (
                                        supposed_reason_of_violence: App.Data.BaseDataClass,
                                    ) => supposed_reason_of_violence.id
                                "
                                label="violence_incident_location_id"
                            ></v-select>
                            <InputError
                                :message="
                                    form.errors.supposed_reason_of_violence_id
                                "
                            />
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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                name="violence_details"
                                placeholder="Detalhes da violência"
                                rows="4"
                            >
                            </textarea>
                            <InputError
                                :message="form.errors.violence_details"
                            />
                        </div>
                        <div
                            class="flex gap-4 col-span-2 cursor-pointer"
                            @click="onCliqueIsViolenceCausedDeath"
                        >
                            <input
                                id="is_violence_caused_death"
                                v-model="form.is_violence_caused_death"
                                name="requires_forwards"
                                class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="A violência resultou em morte?"
                                type="checkbox"
                            />
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                >A violência resultou em morte?</label
                            >
                            <InputError
                                :message="form.errors.is_violence_caused_death"
                            />
                        </div>
                        <div
                            class="flex gap-4 col-span-2 cursor-pointer"
                            @click="onCliqueRequiredForwards"
                        >
                            <input
                                id="requires_forwards"
                                ref="requiresForwardsInput"
                                v-model="form.requires_forwards"
                                name="requires_forwards"
                                class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Encaminhamento necessário"
                                type="checkbox"
                            />
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                >Necessita de encaminhamento?</label
                            >
                            <InputError
                                :message="form.errors.is_violence_caused_death"
                            />
                        </div>
                        <div class="col-span-2" v-if="form.requires_forwards">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="forward_to_organizations"
                                >Encaminhar para</label
                            >
                            <v-select
                                v-model="form.forward_to_organization"
                                :get-option-label="
                                    (option: OrganizationData) => option.name
                                "
                                :options="organizations"
                                placeholder="Encaminhar para"
                                :reduce="(unit: OrganizationData) => unit.id"
                                label="forward_to_organizations"
                            ></v-select>
                            <InputError
                                :message="form.errors.forward_to_organization"
                            />
                        </div>
                        <button
                            class="w-full col-span-2 text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-bold rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            type="submit"
                            @click="registerCase"
                        >
                            Registar
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
