<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@components/InputError.vue";
import { onMounted, ref, watch } from "vue";
import { ulid } from "ulidx";
import ImageUploader from "@components/ImageUploader.vue";
interface Section {
    id: string;
    title: string;
    content: string;
    cover: Array<File> | [];
}
const titleRef = ref();
const shortDescriptionRef = ref();
const locationRef = ref();
const form  = useForm({
    title: "",
    content: "",
    cover: [],
    sections: Array<Section>(),
    short_description: "",
    location: "",
});
const addSection = () => {
    form.sections.push({
        id : ulid(),
        title: "",
        content: "",
        cover: [],
    });
};

const createArticle = () => {
    form.post(route('articles.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            titleRef.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Criar um post" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="max-w-7xl mx-auto p-6 lg:p-8 bg-white">
                <div class="grid gap-6 ">
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Título
                            </label>
                            <input
                                id="title"
                                ref="titleRef"
                                v-model="form.title"
                                name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Título"
                                type="text"
                            />
                            <InputError :message="form.errors.title" />
                        </div>
                        <div class="md:col-span-2">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Breve descrição
                            </label>
                            <input
                                id="short_description"
                                ref="shortDescriptionRef"
                                v-model="form.short_description"
                                name="short_description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Breve descrição"
                                type="text"
                            />
                            <InputError :message="form.errors.short_description" />
                        </div>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="location"
                            >Localização
                            </label>
                            <input
                                id="location"
                                ref="locationRef"
                                v-model="form.title"
                                name="location"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Localização"
                                type="text"
                            />
                            <InputError :message="form.errors.location" />
                        </div>
                        <div class="md:col-span-3">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Capa do post
                            </label>
                            <ImageUploader
                                @update:images="
                                (files: any) => (form.cover = files)
                            "
                                :multiple="false"
                                :disabledUpload="true"
                                :disabledCancel="true"
                                mediaType="image/*"
                                labelText="Carregar imagem"
                            />
                            <span class="text-medium text-red-500 font-semibold">{{
                                    form.errors.cover
                                }}</span>
                        </div>
                    </div>
                    <div class="grid w-full gap-4">
                        <div class="min-h-32">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Conteúdo
                            </label>
                            <QuillEditor
                                theme="snow"
                                class="!h-fit"
                                v-model="form.content"
                            />
                            <InputError :message="form.errors.content" />
                        </div>
                    </div>
                    <div>
                        <button @click="addSection" class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="-4.5 -4.5 24 24" fill="currentColor"><path d="M8.9 6.9v-5a1 1 0 1 0-2 0v5h-5a1 1 0 1 0 0 2h5v5a1 1 0 1 0 2 0v-5h5a1 1 0 1 0 0-2h-5z"></path></svg> <span class="mx-4">
                            Adicionar secção
                        </span></button>
                    </div>
                    <div v-for="(section, index) in form.sections" :key="section.id" class="grid gap-4 bg-red-50 p-6">
                        <button
                            @click="form.sections.splice(index, 1)"
                            class="flex items-center justify-center text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                        >Remove</button>
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Título da secção
                            </label>
                            <input
                                v-model="section.title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Título da secção"
                                type="text"
                            />
                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Capa da secção
                            </label>
                            <ImageUploader
                                @update:images="
                                (files: any) => (section.cover = files)
                            "
                                :multiple="false"
                                :disabledUpload="true"
                                :disabledCancel="true"
                                mediaType="image/*"
                                labelText="Carregar imagem"
                            />
                        </div>
                        <div class="min-h-32">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                            >Conteúdo da secção
                            </label>
                            <QuillEditor
                                theme="snow"
                                class="!h-fit"
                                v-model="section.content"
                            />
                        </div>
                    </div>
                  <div class="grid justify-items-end">
                      <button
                          class=" right-0  w-fit text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-bold rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                          type="submit"
                          @click="createArticle"
                      >
                          Salvar post
                      </button>
                  </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
