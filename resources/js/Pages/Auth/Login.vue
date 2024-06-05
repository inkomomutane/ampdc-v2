<script setup lang="ts">
import InputError from "@/components/InputError.vue";
import {Link, useForm} from "@inertiajs/vue3";
import loginImage from "@images/login.png";
import logo from "@images/logo.png";

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => {
            form.reset("password");
        },
    });
};
</script>

<template>

    <section class="bg-rose-50 min-h-screen grid grid-cols-1 md:grid-cols-5">
        <div class="relative overflow-hidden  col-span-2 hidden md:flex  bg-gradient-to-t from-orange-500 to-rose-500 justify-around items-center ">
            <div class="px-16">
                <h1 class="text-white font-bold text-2xl font-sans uppercase text-center">
                    Bem vindo
                </h1>
                <br>
                <h2  class="text-white font-bold text-2xl font-sans uppercase text-center">SISTEMA UNIFICADO DE PREVENÇÃO E RESPOSTA À VIOLÊNCIA BASEADA NO GÊNERO</h2>
                <div class="absolute border-rose-200 -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
                <div class="absolute border-orange-200 -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            </div>
        </div>
        <section class="relative bg-gradient-to-b to-amber-100 from-white dark:bg-gray-900 col-span-3 flex">
            <img class="absolute inset-0 w-full h-full object-cover" :src="loginImage" alt="mockup">
            <div class="absolute   inset-0 bg-black opacity-40"></div>
            <div class=" relative py-8 px-4 mx-auto my-auto w-5/6 sm:w-3/5 md:w-5/6 lg:w-3/5  " >
                <div class=" flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
                    <div class=" min-w-full  rounded-sm dark:border md:mt-0  xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-white p-6 space-y-4 md:space-y-6 sm:p-8 rounded flex flex-col">
                            <Link href="/" class="mx-auto">
                                <img alt="logo" :src="logo" class="w-24" />
                            </Link>
                            <form
                                @submit.prevent="submit"
                                class="space-y-4 md:space-y-6"
                            >
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        v-model="form.email"

                                        class="border border-rose-400
                                text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full
                                p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ex: comercial@cliquecv.com"
                                        required
                                    />
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Palavra-passe
                                    </label>
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        v-model="form.password"
                                        placeholder="••••••••••••••••"
                                        class="
                                border border-rose-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                dark:focus:border-blue-500"
                                        required
                                    />
                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>

                                <button
                                    type="submit"
                                    class="w-full text-white bg-orange-600 hover:bg-rose-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                >
                                    Entrar
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>
