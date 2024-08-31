<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@components/InputError.vue";
import { PropType, watch } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";
import {
    CivilState,
    Gender,
    getArrayFromEnum,
    KeyPair,
    PeriodOfViolenceAct,
    EducationLevel,
} from "@/types/casestatus";
import { VictimData } from "@/types/generated";

const props = defineProps({
    victim: {
        type: Object as PropType<VictimData>,
        required: true,
    },
    messages: {
        type: Object as PropType<FlasherResponse>,
        required: false,
    },
});

const genderOptions = getArrayFromEnum(Gender);
const civilStateOptions = getArrayFromEnum(CivilState);
const educationLevelOptions = getArrayFromEnum(EducationLevel);

const form = useForm({
    name: props.victim.name,
    age: props.victim.age,
    gender: props.victim.gender,
    civil_state: props.victim.civil_state,
    contact: props.victim.contact,
    profession: props.victim.profession,
    education_level: props.victim.education_level,
    contact_alternative: props.victim.contact_alternative,
    contact_person: props.victim.contact_person,
    city: props.victim.city,
    neighborhood: props.victim.neighborhood,
    address: props.victim.address,
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

const registerVictim = () => {
    form.post(
        route("victim.data.update", {
            victim: props.victim.id,
        }),
        {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {},
        },
    );
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
                            class="text-xl font-semibold text-gray-900 dark:text-white"
                        >
                            Editar dados da víctima
                        </h1>
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
                                    <span class="text-red-500">*</span>
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
                                    for="name"
                                    >Idade da vítima
                                    <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="age"
                                    ref="ageInput"
                                    v-model="form.age"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Idade da vítima"
                                    type="text"
                                />
                                <InputError :message="form.errors.age" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="name"
                                    >Sexo da vítima
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.gender"
                                    :get-option-label="
                                        (option: KeyPair) => option.key
                                    "
                                    :options="genderOptions"
                                    placeholder="Sexo da vítima"
                                    :reduce="(gender: KeyPair) => gender.value"
                                    label="gender"
                                ></v-select>
                                <InputError :message="form.errors.gender" />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="civil_state"
                                    >Estado civil da vítima
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.civil_state"
                                    :get-option-label="
                                        (option: KeyPair) => option.key
                                    "
                                    :options="civilStateOptions"
                                    placeholder="Estado civil da vítima"
                                    :reduce="(gender: KeyPair) => gender.value"
                                    label="civil_state"
                                ></v-select>
                                <InputError
                                    :message="form.errors.civil_state"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="contact"
                                    >Profissão da vítima
                                </label>
                                <input
                                    id="profession"
                                    ref="professionInput"
                                    v-model="form.profession"
                                    name="profession"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Profissão da vítima"
                                    type="text"
                                />
                                <InputError :message="form.errors.profession" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="education_level"
                                    >Nível acadêmico da vítima
                                    <span class="text-red-500">*</span>
                                </label>
                                <v-select
                                    v-model="form.education_level"
                                    :get-option-label="
                                        (option: KeyPair) => option.key
                                    "
                                    :options="educationLevelOptions"
                                    placeholder="Nível acadêmico da vítima"
                                    :reduce="(value: KeyPair) => value.value"
                                    label="education_level"
                                ></v-select>
                                <InputError
                                    :message="form.errors.education_level"
                                />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="city"
                                    >Cidade de residência da vítima
                                </label>
                                <input
                                    id="city"
                                    ref="cityInput"
                                    v-model="form.city"
                                    name="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Cidade de residência da vítima"
                                    type="text"
                                />
                                <InputError :message="form.errors.city" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="neighborhood"
                                    >Bairro de residência da vítima
                                </label>
                                <input
                                    id="neighborhood"
                                    ref="neighborhoodInput"
                                    v-model="form.neighborhood"
                                    name="neighborhood"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Bairro de residência da vítima"
                                    type="text"
                                />
                                <InputError
                                    :message="form.errors.neighborhood"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="address"
                                    >Endereço da vítima
                                </label>
                                <input
                                    id="address"
                                    ref="addressInput"
                                    v-model="form.address"
                                    name="address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Endereço da vítima"
                                    type="text"
                                />
                                <InputError :message="form.errors.address" />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="contact"
                                    >Contacto da vítima
                                </label>
                                <input
                                    id="contact"
                                    ref="contactInput"
                                    v-model="form.contact"
                                    name="contact"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Contacto da vítima"
                                    type="text"
                                />
                                <InputError :message="form.errors.contact" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="contact_alternative"
                                    >Contacto alternativo da vítima
                                </label>
                                <input
                                    id="contact_alternative"
                                    ref="contact_alternativeInput"
                                    v-model="form.contact_alternative"
                                    name="contact_alternative"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Contacto alternativo da vítima"
                                    type="text"
                                />
                                <InputError
                                    :message="form.errors.contact_alternative"
                                />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="contact"
                                    >Pessoa de contacto da vítima
                                </label>
                                <input
                                    id="contact_personInput"
                                    ref="contact_personInput"
                                    v-model="form.contact_person"
                                    name="contact_personInput"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Pessoa de contacto da vítima"
                                    type="text"
                                />
                                <InputError
                                    :message="form.errors.contact_person"
                                />
                            </div>
                        </div>
                        <button
                            class="w-full col-span-2 text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-bold rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            type="submit"
                            @click="registerVictim"
                        >
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
