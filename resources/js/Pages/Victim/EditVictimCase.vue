<script setup lang="ts">
import { PropType } from "vue";
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@components/InputError.vue";
import {
    getArrayFromEnum,
    KeyPair,
    PeriodOfViolenceAct,
} from "@/types/casestatus";
import {
    PerpetratorData,
    SupposedReasonOfViolenceData,
    VictimCaseData,
    ViolenceIncidentLocationData,
    ViolenceTypeData,
} from "@/types/generated";
const props = defineProps({
    victimCase: {
        type: Object as PropType<VictimCaseData>,
        required: true,
    },
    violenceTypes: {
        type: Array<ViolenceTypeData>,
        required: true,
    },
    perpetrators: {
        type: Array<PerpetratorData>,
        required: true,
    },
    supposedReasonsOfViolence: {
        type: Array<SupposedReasonOfViolenceData>,
        required: true,
    },
    violenceIncidentLocations: {
        type: Array<ViolenceIncidentLocationData>,
        required: true,
    },
});

const periodOfViolenceOptions = getArrayFromEnum(PeriodOfViolenceAct);

const form = useForm({
    violence_type_id: props.victimCase?.violenceType?.id,
    supposed_reason_of_violence_id:
        props.victimCase?.supposedReasonOfViolence?.id,
    perpetrator_id: props.victimCase?.perpetrator?.id,
    perpetrator_name: props.victimCase?.perpetratorName,
    perpetrator_profession: props.victimCase?.perpetratorProfession,
    perpetrator_address: props.victimCase?.perpetratorAddress,
    perpetrator_contact: props.victimCase?.perpetratorContact,
    period_of_violence_act: props.victimCase?.periodOfViolenceAct,
    violence_incident_location_id:
        props.victimCase?.violenceIncidentLocation?.id,
    violence_details: props.victimCase?.violenceDetails,
    is_violence_caused_death: props.victimCase?.isViolenceCausedDeath,
    is_the_first_time: props.victimCase?.isTheFirstTime,
    is_violence_reported_to_authorities:
        props.victimCase?.isViolenceReportedToAuthorities,

    last_violences_description: props.victimCase?.lastViolencesDescription,

    is_the_last_cases_reported_to_authorities:
        props.victimCase?.isTheLastCasesReportedToAuthorities,
    are_last_cases_resolved: props.victimCase?.areLastCasesResolved,
    last_cases_resolution_details: props.victimCase?.lastCasesResolutionDetails,
});

const onClickIsViolenceCausedDeath = () => {
    form.is_violence_caused_death = !form.is_violence_caused_death;
};

const onClickIsTheFirstTime = () => {
    form.is_the_first_time = !form.is_the_first_time;
    if (form.is_the_first_time) {
        form.last_violences_description = "";
        form.is_the_last_cases_reported_to_authorities = false;
        form.are_last_cases_resolved = false;
        form.last_cases_resolution_details = "";
    }
};

const onClickIsViolenceReportedToAuthorities = () => {
    form.is_violence_reported_to_authorities =
        !form.is_violence_reported_to_authorities;
};

const onClickIsTheLastCasesReportedToAuthorities = () => {
    form.is_the_last_cases_reported_to_authorities =
        !form.is_the_last_cases_reported_to_authorities;
};

const onClickAreLastCasesResolved = () => {
    form.are_last_cases_resolved = !form.are_last_cases_resolved;
};

const updateVictimCase = () => {
    form.post(route("victim.case.update", { victimCase: props.victimCase.id }));
};
</script>

<template>
    <Head title="Registar novo caso" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="pb-12">
                <div class="max-w-7xl mx-auto p-4 bg-white dark:bg-slate-600">
                    <div class="p-4 bg-slate-100 rounded dark:bg-slate-900">
                        <h1
                            class="text-lg font-semibold text-gray-900 dark:text-white"
                        >
                            Actualizar caso da vítima
                            {{ victimCase.victim.name }}
                        </h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Preencha o formulário abaixo para registar um novo
                            caso para a vítima
                            <strong>{{ victimCase.victim.name }}</strong
                            >.
                        </p>
                    </div>
                </div>
                <div
                    class="max-w-7xl mx-auto p-6 lg:p-8 bg-white dark:bg-slate-700"
                >
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="col-span-2 grid md:grid-cols-3 gap-4">
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="violence_type_id"
                                    >Tipo de violência sofrida
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.violence_type_id"
                                    :get-option-label="
                                        (violence: ViolenceTypeData) =>
                                            violence.name
                                    "
                                    :options="violenceTypes"
                                    placeholder="Selecione o tipo de violência"
                                    :reduce="
                                        (violence: ViolenceTypeData) =>
                                            violence.id
                                    "
                                ></v-select>
                                <InputError
                                    :message="form.errors.violence_type_id"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="violence_type_id"
                                    >Suposto motivo da violência
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="
                                        form.supposed_reason_of_violence_id
                                    "
                                    :get-option-label="
                                        (key: SupposedReasonOfViolenceData) =>
                                            key.name
                                    "
                                    :options="supposedReasonsOfViolence"
                                    placeholder="Suposto motivo da violência"
                                    :reduce="
                                        (value: SupposedReasonOfViolenceData) =>
                                            value.id
                                    "
                                ></v-select>
                                <InputError
                                    :message="
                                        form.errors
                                            .supposed_reason_of_violence_id
                                    "
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="period_of_violence_act"
                                    >Período que ocorreu a violência
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.period_of_violence_act"
                                    :get-option-label="
                                        (key: KeyPair) => key.key
                                    "
                                    :options="periodOfViolenceOptions"
                                    placeholder="Período que ocorreu a violência"
                                    :reduce="(value: KeyPair) => value.value"
                                ></v-select>
                                <InputError
                                    :message="
                                        form.errors.period_of_violence_act
                                    "
                                />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="violence_incident_location_id"
                                    >Local onde ocorreu a violência
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.violence_incident_location_id"
                                    :get-option-label="
                                        (key: ViolenceIncidentLocationData) =>
                                            key.name
                                    "
                                    :options="violenceIncidentLocations"
                                    placeholder="Local onde ocorreu a violência"
                                    :reduce="
                                        (value: ViolenceIncidentLocationData) =>
                                            value.id
                                    "
                                ></v-select>
                                <InputError
                                    :message="
                                        form.errors
                                            .violence_incident_location_id
                                    "
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="perpetrator_id"
                                    >Perpetrador da violência
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.perpetrator_id"
                                    :get-option-label="
                                        (key: PerpetratorData) => key.name
                                    "
                                    :options="perpetrators"
                                    placeholder="Perpetrador da violência"
                                    :reduce="
                                        (value: PerpetratorData) => value.id
                                    "
                                ></v-select>
                                <InputError
                                    :message="form.errors.perpetrator_id"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="name"
                                    >Nome do perpetrador
                                </label>
                                <input
                                    id="perpetrator_name"
                                    ref="perpetrator_nameInput"
                                    v-model="form.perpetrator_name"
                                    name="perpetrator_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Nome do perpetrador"
                                    type="text"
                                />
                                <InputError
                                    :message="form.errors.perpetrator_name"
                                />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="perpetrator_profession"
                                    >Profissão do perpetrador
                                </label>
                                <input
                                    id="perpetrator_profession"
                                    ref="perpetrator_professionInput"
                                    v-model="form.perpetrator_profession"
                                    name="perpetrator_profession"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Profissão do perpetrador"
                                    type="text"
                                />
                                <InputError
                                    :message="
                                        form.errors.perpetrator_profession
                                    "
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="perpetrator_address"
                                    >Endereço do perpetrador
                                </label>
                                <input
                                    id="perpetrator_address"
                                    ref="perpetrator_addressInput"
                                    v-model="form.perpetrator_address"
                                    name="perpetrator_address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Endereço do perpetrador"
                                    type="text"
                                />
                                <InputError
                                    :message="form.errors.perpetrator_address"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="perpetrator_address"
                                    >Contacto do perpetrador
                                </label>
                                <input
                                    id="perpetrator_contact"
                                    ref="perpetrator_contactInput"
                                    v-model="form.perpetrator_contact"
                                    name="perpetrator_contact"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Contacto do perpetrador"
                                    type="text"
                                />
                                <InputError
                                    :message="form.errors.perpetrator_contact"
                                />
                            </div>
                            <div class="md:col-span-3">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="violence_details"
                                    >Detalhes da violência
                                    <span class="text-red-500">*</span>
                                </label>
                                <QuillEditor
                                    :options="{
                                        placeholder: 'Detalhes da violência',
                                    }"
                                    contentType="html"
                                    theme="snow"
                                    class="!h-fit"
                                    toolbar="minimal"
                                    v-model:content="form.violence_details"
                                />
                                <InputError
                                    :message="form.errors.violence_details"
                                />
                            </div>

                            <div
                                class="flex gap-4 cursor-pointer"
                                @click="onClickIsViolenceCausedDeath"
                            >
                                <input
                                    id="is_violence_caused_death"
                                    v-model="form.is_violence_caused_death"
                                    name="is_violence_caused_death"
                                    class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="A violência resultou em morte?"
                                    type="checkbox"
                                />
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                    >A violência resultou em morte?</label
                                >
                                <InputError
                                    :message="
                                        form.errors.is_violence_caused_death
                                    "
                                />
                            </div>
                            <div
                                class="flex gap-4 cursor-pointer"
                                @click="onClickIsTheFirstTime"
                            >
                                <input
                                    id="is_the_first_time"
                                    v-model="form.is_the_first_time"
                                    name="is_the_first_time"
                                    class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="É primeira vez a sofrer violência?"
                                    type="checkbox"
                                />
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                    >É primeira vez a sofrer violência?</label
                                >
                                <InputError
                                    :message="form.errors.is_the_first_time"
                                />
                            </div>
                            <div
                                class="flex gap-4 cursor-pointer"
                                @click="onClickIsViolenceReportedToAuthorities"
                            >
                                <input
                                    id="is_the_first_time"
                                    v-model="
                                        form.is_violence_reported_to_authorities
                                    "
                                    name="is_the_first_time"
                                    class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Reportou o caso nas autoridades??"
                                    type="checkbox"
                                />
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                    >Reportou o caso nas autoridades?
                                </label>
                                <InputError
                                    :message="
                                        form.errors
                                            .is_violence_reported_to_authorities
                                    "
                                />
                            </div>

                            <div
                                v-if="!form.is_the_first_time"
                                class="md:col-span-3"
                            >
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="last_violences_description"
                                    >Detalhes da ultima violência sofrida
                                    <span class="text-red-500">*</span>
                                </label>
                                <QuillEditor
                                    :options="{
                                        placeholder:
                                            'Detalhes da ultima violência sofrida',
                                    }"
                                    contentType="html"
                                    theme="snow"
                                    class="!h-fit"
                                    toolbar="minimal"
                                    v-model:content="
                                        form.last_violences_description
                                    "
                                />
                                <InputError
                                    :message="
                                        form.errors.last_violences_description
                                    "
                                />
                            </div>
                            <div
                                v-if="!form.is_the_first_time"
                                class="flex gap-4 cursor-pointer"
                                @click="
                                    onClickIsTheLastCasesReportedToAuthorities
                                "
                            >
                                <input
                                    id="is_the_last_cases_reported_to_authorities"
                                    v-model="
                                        form.is_the_last_cases_reported_to_authorities
                                    "
                                    name="is_the_last_cases_reported_to_authorities"
                                    class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="O último caso foi reportado as autoridades?"
                                    type="checkbox"
                                />
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                    >O último caso foi reportado as autoridades?
                                </label>
                                <InputError
                                    :message="
                                        form.errors
                                            .is_the_last_cases_reported_to_authorities
                                    "
                                />
                            </div>
                            <div
                                v-if="!form.is_the_first_time"
                                class="flex gap-4 cursor-pointer"
                                @click="onClickAreLastCasesResolved"
                            >
                                <input
                                    id="is_the_first_time"
                                    v-model="form.are_last_cases_resolved"
                                    name="is_the_first_time"
                                    class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="O caso foi resolvido?"
                                    type="checkbox"
                                />
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                                    >O caso foi resolvido?
                                </label>
                                <InputError
                                    :message="
                                        form.errors.are_last_cases_resolved
                                    "
                                />
                            </div>
                            <div
                                v-if="form.are_last_cases_resolved"
                                class="md:col-span-3"
                            >
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="last_cases_resolution_details"
                                    >Detalhes da resolução do último caso
                                    <span class="text-red-500">*</span>
                                </label>
                                <QuillEditor
                                    :options="{
                                        placeholder:
                                            'Detalhes da resolução do último caso',
                                    }"
                                    contentType="html"
                                    theme="snow"
                                    class="!h-fit"
                                    toolbar="minimal"
                                    v-model:content="
                                        form.last_cases_resolution_details
                                    "
                                />
                                <InputError
                                    :message="
                                        form.errors
                                            .last_cases_resolution_details
                                    "
                                />
                            </div>
                        </div>
                        <button
                            class="w-full col-span-2 text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-bold rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            type="submit"
                            @click="updateVictimCase"
                        >
                            Actualizar dados do caso
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
