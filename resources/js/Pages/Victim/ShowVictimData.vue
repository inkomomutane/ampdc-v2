<script lang="ts" setup>
import { PropType, ref, watch } from "vue";
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@components/InputLabel.vue";
import DisabledTextInput from "@components/DisabledTextInput.vue";
import { OrganizationData, UserData, VictimCaseData, VictimData } from "@/types/generated";
import ForwardCase from "@/Pages/Victim/ForwardCase.vue";
import Flasher from "@/helprs";
import { FlasherResponse } from "@flasher/flasher";
import ResolveCase from "@/Pages/Victim/ResolveCase.vue";

const props = defineProps({
    victim: {
        type: Object as PropType<VictimData>,
        required: true,
    },
    cases: {
        type: Array<VictimCaseData>,
        required: true,
    },
    organizations: {
        type: Array<OrganizationData>,
        default: Array<OrganizationData>(),
    },
    messages: Object as PropType<FlasherResponse>,
});

const caseToForward = ref<VictimCaseData | null>(null);
const caseToForwardTrigger = ref(false);

function openForwardCaseModal(caseId: String) {
    caseToForward.value = caseId;
    caseToForwardTrigger.value = true;
}

function closeForwardCaseModal() {
    caseToForward.value = null;
    caseToForwardTrigger.value = false;
}

const caseToResolve = ref(null);
const caseToResolveTrigger = ref(false);

function openResolveCaseModal(caseId: String) {
    caseToResolve.value = caseId;
    caseToResolveTrigger.value = true;
}

function closeResolveCaseModal() {
    caseToResolve.value = null;
    caseToResolveTrigger.value = false;
}



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
    <Head title="Dados de vítima" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div
                class="max-w-7xl mx-auto p-6 lg:p-8 bg-white dark:bg-slate-800"
            >
                <header>
                    <h2
                        class="text-lg font-medium text-gray-900 dark:text-gray-100"
                    >
                        Informação da vítima
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Informações detalhadas sobre a vítima.
                    </p>
                    <p
                        class="p-1 text-sm bg-green-500 w-fit rounded-sm font-semibold my-4 text-white px-4"
                    ></p>
                </header>
                <div class="grid gap-6">
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div>
                            <InputLabel value="Nome" />
                            <DisabledTextInput
                                :model-value="props.victim?.name ?? ''"
                            />
                        </div>
                        <div>
                            <InputLabel value="Idade" />
                            <DisabledTextInput
                                :model-value="props.victim?.age"
                            />
                        </div>
                        <div>
                            <InputLabel value="Gênero" />
                            <DisabledTextInput
                                :model-value="props.victim?.gender"
                            />
                        </div>
                        <div>
                            <InputLabel value="Estado civil" />
                            <DisabledTextInput
                                :model-value="props.victim?.civil_state"
                            />
                        </div>
                        <div>
                            <InputLabel value="Profissão da vítima" />
                            <DisabledTextInput
                                :model-value="props.victim?.profession"
                            />
                        </div>
                        <div>
                            <InputLabel value="Nível acadêmico da vítima" />
                            <DisabledTextInput
                                :model-value="props.victim?.education_level"
                            />
                        </div>
                        <div>
                            <InputLabel
                                value="Cidade de residência da vítima"
                            />
                            <DisabledTextInput
                                :model-value="props.victim?.city"
                            />
                        </div>
                        <div>
                            <InputLabel
                                value="Bairro de residência da vítima"
                            />
                            <DisabledTextInput
                                :model-value="props.victim?.neighborhood"
                            />
                        </div>
                        <div>
                            <InputLabel value="Endereço da vítima" />
                            <DisabledTextInput
                                :model-value="props.victim?.address"
                            />
                        </div>
                        <div>
                            <InputLabel value="Contacto da vítima" />
                            <DisabledTextInput
                                :model-value="props.victim?.contact"
                            />
                        </div>
                        <div>
                            <InputLabel
                                value="Contacto alternativo da vítima"
                            />
                            <DisabledTextInput
                                :model-value="props.victim?.contact_alternative"
                            />
                        </div>
                        <div>
                            <InputLabel value="Pessoa de contacto da vítima" />
                            <DisabledTextInput
                                :model-value="props.victim?.contact_person"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto mb-16">
                <p
                    class="text-sm bg-slate-800 w-fit rounded-sm font-semibold my-4 text-white p-2"
                >
                    Casos de violência contra a vítima
                </p>

                <div
                    v-for="vCase in cases as VictimCaseData[]"
                    class="max-w-7xl mx-auto p-6 lg:p-8 bg-white dark:bg-slate-800 mb-5"
                >
                    <header class="flex flex-row justify-between">
                    <div>
                        <h2
                            class="text-lg font-medium text-gray-900 dark:text-gray-100"
                        >
                            Informação do caso :
                            <span
                                class="text-sm bg-blue-800 dark:bg-slate-100 w-fit rounded-sm font-semibold my-4 text-white dark:text-slate-900 p-2"
                            >
                                {{ vCase.caseCode }}
                            </span>
                        </h2>
                        <p
                            class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                        >
                            Informações detalhadas do caso de violência.
                        </p>
                        <p
                            :class="{
                                'bg-green-500': vCase.isTerminated,
                                'bg-blue-500': !vCase.isTerminated,
                            }"
                            class="p-1 text-sm w-fit rounded-sm font-semibold my-4 text-white px-4"
                        >
                            {{
                                vCase.isTerminated
                                    ? "Encerrado"
                                    : "Em andamento"
                            }}
                        </p>
                    </div>
                        <div class="grid grid-cols-2 justify-end ">
                            <button
                                 v-if="!vCase.isTerminated"
                                @click="openForwardCaseModal(vCase.id)"
                                class="flex items-center w-fit h-fit justify-center text-white bg-green-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                            >
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="m9 10l3.258 2.444a1 1 0 0 0 1.353-.142L20 5"></path><path d="M21 12a9 9 0 1 1-6.67-8.693"></path></g></svg>
                                <span class="ms-4">Encaminhar caso</span>
                            </button>

                            <button
                                @click="openResolveCaseModal(vCase.id)"
                                class="flex items-center h-fit w-fit justify-center text-white bg-blue-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                            >
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M14.3536 1.64663C13.4679 0.761016 12.0321 0.761019 11.1465 1.64664L6.89646 5.89664C6.84157 5.95152 6.80022 6.01844 6.77567 6.09207L5.52567 9.84207C5.46578 10.0217 5.51254 10.2198 5.64646 10.3537C5.78038 10.4877 5.97846 10.5344 6.15813 10.4745L9.90813 9.22453C9.98177 9.19998 10.0487 9.15863 10.1036 9.10374L14.3536 4.85374C15.2392 3.96813 15.2392 2.53225 14.3536 1.64663ZM12.9868 7.63468C12.9956 7.7554 13 7.8773 13 8.00024C13 10.7617 10.7614 13.0002 8 13.0002C5.23858 13.0002 3 10.7617 3 8.00024C3 5.23882 5.23858 3.00024 8 3.00024C8.12291 3.00024 8.24479 3.00468 8.36548 3.0134L9.24855 2.13033C8.8458 2.04509 8.42814 2.00024 8 2.00024C4.68629 2.00024 2 4.68654 2 8.00024C2 11.314 4.68629 14.0002 8 14.0002C11.3137 14.0002 14 11.314 14 8.00024C14 7.57208 13.9552 7.15439 13.8699 6.75162L12.9868 7.63468Z" fill="currentColor"></path></svg>
                                <span class="ms-4">Actualizar estado do caso</span>
                            </button>
                        </div>
                    </header>
                    <div class="grid gap-6">
                        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <div>
                                <InputLabel value="Tipo de violência sofrida" />
                                <DisabledTextInput
                                    :model-value="vCase.violenceType?.name"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    value="Suposto motivo da violência"
                                />
                                <DisabledTextInput
                                    :model-value="
                                        vCase.supposedReasonOfViolence?.name
                                    "
                                />
                            </div>

                            <div>
                                <InputLabel
                                    value="Período que ocorreu a violência"
                                />
                                <DisabledTextInput
                                    :model-value="vCase.periodOfViolenceAct"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    value="Local onde ocorreu a violência"
                                />
                                <DisabledTextInput
                                    :model-value="
                                        vCase.violenceIncidentLocation?.name
                                    "
                                />
                            </div>
                            <div>
                                <InputLabel value="Perpetrador da violência" />
                                <DisabledTextInput
                                    :model-value="vCase.perpetrator?.name"
                                />
                            </div>

                            <div>
                                <InputLabel value="Nome do perpetrador" />
                                <DisabledTextInput
                                    :model-value="vCase.perpetratorName"
                                />
                            </div>

                            <div>
                                <InputLabel value="Profissão do perpetrador" />
                                <DisabledTextInput
                                    :model-value="vCase.perpetratorProfession"
                                />
                            </div>
                            <div>
                                <InputLabel value="Endereço do perpetrador" />
                                <DisabledTextInput
                                    :model-value="vCase.perpetratorAddress"
                                />
                            </div>

                            <div>
                                <InputLabel value="Contacto do perpetrador" />
                                <DisabledTextInput
                                    :model-value="vCase.perpetratorContact"
                                />
                            </div>

                            <div class="sm:col-span-2 md:col-span-3">
                                <InputLabel value="Detalhes da violência" />
                                <div
                                    class="bg-zinc-200 p-4 py-6"
                                    v-html="vCase.violenceDetails"
                                />
                            </div>
                            <div>
                                <InputLabel
                                    value="A violência resultou em morte?"
                                />
                                <DisabledTextInput
                                    :model-value="
                                        vCase.isViolenceCausedDeath
                                            ? 'Sim'
                                            : 'Não'
                                    "
                                />
                            </div>
                            <div>
                                <InputLabel
                                    value="É primeira vez a sofrer violência?"
                                />
                                <DisabledTextInput
                                    :model-value="
                                        vCase.isTheFirstTime ? 'Sim' : 'Não'
                                    "
                                />
                            </div>
                            <div>
                                <InputLabel
                                    value="Reportou o caso nas autoridades?"
                                />
                                <DisabledTextInput
                                    :model-value="
                                        vCase.isTheFirstTime ? 'Sim' : 'Não'
                                    "
                                />
                            </div>
                            <div
                                class="sm:col-span-2 md:col-span-3 grid sm:grid-cols-2 md:grid-cols-3 gap-4"
                                :class="{
                                    hidden: vCase.isTheFirstTime,
                                }"
                            >
                                <div class="sm:col-span-2 md:col-span-3">
                                    <InputLabel
                                        value="Detalhes da ultima violência sofrida"
                                    />
                                    <div
                                        class="bg-zinc-200 p-4 py-6"
                                        v-html="vCase.lastViolencesDescription"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        value="O último caso foi reportado as autoridades?"
                                    />
                                    <DisabledTextInput
                                        :model-value="
                                            vCase.isTheLastCasesReportedToAuthorities
                                                ? 'Sim'
                                                : 'Não'
                                        "
                                    />
                                </div>
                                <div>
                                    <InputLabel value="O caso foi resolvido?" />
                                    <DisabledTextInput
                                        :model-value="
                                            vCase.areLastCasesResolved
                                                ? 'Sim'
                                                : 'Não'
                                        "
                                    />
                                </div>
                                <div
                                    v-if="vCase.areLastCasesResolved"
                                    class="sm:col-span-2 md:col-span-3"
                                >
                                    <InputLabel
                                        value="Detalhes da ultima violência sofrida"
                                    />
                                    <div
                                        class="bg-zinc-200 p-4 py-6"
                                        v-html="
                                            vCase.lastCasesResolutionDetails
                                        "
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ForwardCase v-if="caseToForwardTrigger" :open-modal="caseToForwardTrigger" :close="closeForwardCaseModal" :organizations="organizations" :case="caseToForward" />
            <ResolveCase v-if="caseToResolveTrigger" :open-modal="caseToResolveTrigger" :close="closeResolveCaseModal" :case="caseToResolve" />
        </template>
    </AuthenticatedLayout>
</template>
