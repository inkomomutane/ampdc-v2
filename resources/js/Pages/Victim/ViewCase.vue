<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import InputError from "@components/InputError.vue";
import {PropType, watch} from "vue";
import {FlasherResponse} from "@flasher/flasher";
import Flasher, {progressCasesColor} from "@/helprs";
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
    violence_type_id: props.victimCase?.victim.violenceType.id,
    violence_details: props.victimCase?.caseDetails,
    contact: props.victimCase?.victim.contact,
    requires_forwards: props.victimCase?.isForwarded,
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
                            Dados do caso : <strong>{{ props.victimCase.caseCode }}</strong>
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
                                class="disabled  text-sm   block w-full p-2.5 border-none text-white  font-semibold "
                               :class="progressCasesColor(props.victimCase.progressStatus)"
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
                <div class="max-w-7xl mx-auto p-6 lg:p-8 bg-white mt-4 ">
                    <div class="p-4 bg-slate-100 rounded mb-4">
                    <h1
                        class="text-xl font-medium text-gray-900 dark:text-white"
                    >
                        Processo do caso nas organizações encarregadas
                    </h1>
                    </div>
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center">
                                        Código do caso
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center">
                                        Organização
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center">
                                        Estado do caso
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Visualizar
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                class="border-b dark:border-gray-700"
                                v-for="victimCase in caseOnOtherOrganizations"
                                :key="victimCase.id ?? ''"
                            >
                                <td class="px-4 py-3 font-semibold text-decoration underline">
                                    {{ victimCase.caseCode }}
                                </td>
                                <td class="px-4 py-3" >
                                    {{ victimCase.organization.name }}
                                </td>
                                <td class="px-4 py-3">
                                         <span
                                             :class="progressCasesColor(victimCase.progressStatus)"
                                             class="px-4 p-1 text-white font-semibold"
                                         >
                                                {{ victimCase.progressStatus }}
                                            </span>
                                </td>
                                <td class="px-4 py-3 w-32">
                                    <Link
                                        :href="route('victim.case.info',{
                                                case: victimCase.id
                                            })"
                                        type="button"
                                        class="flex items-center justify-center w-fit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                    >
                                        <svg width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"></path></svg>
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>


