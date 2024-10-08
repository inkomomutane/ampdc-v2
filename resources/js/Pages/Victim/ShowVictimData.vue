<script lang="ts" setup>
import { PropType } from "vue";
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@components/InputLabel.vue";
import DisabledTextInput from "@components/DisabledTextInput.vue";
import { VictimCaseData, VictimData } from "@/types/generated";

const props = defineProps({
    victim: {
        type: Object as PropType<VictimData>,
        required: true,
    },
    cases: {
        type: Array<VictimCaseData>,
        required: true,
    },
});
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
                    v-for="vCase in cases"
                    class="max-w-7xl mx-auto p-6 lg:p-8 bg-white dark:bg-slate-800 mb-5"
                >
                    <header>
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
        </template>
    </AuthenticatedLayout>
</template>
