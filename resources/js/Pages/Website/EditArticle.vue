<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@components/InputError.vue";
import { PropType, ref } from "vue";
import { ulid } from "ulidx";
import ImageUploader from "@components/ImageUploader.vue";
import ResponsiveImage from "@components/ResponsiveImage.vue";
import DeleteArticle from "@/Pages/Website/DeleteArticle.vue";
import { ArticleData, ArticleSectionData } from "@/types/generated";

const props = defineProps({
    article: {
        type: Object as PropType<ArticleData>,
        required: true,
    },
});

const titleRef = ref();
const shortDescriptionRef = ref();
const locationRef = ref();
const form = useForm({
    title: props.article.title,
    content: props.article.content,
    cover: [],
    media: props.article.cover ?? undefined,
    sections: props.article?.sections.map((section: ArticleSectionData) => ({
        id: section.id,
        title: section.title,
        content: section.content,
        cover: [],
        media: section.cover,
    })),
    short_description: props.article.short_description,
    location: props.article.location,
});
const addSection = () => {
    form.sections.push({
        id: ulid(),
        title: "",
        content: "",
        cover: [],
        media: null,
    });
};

const updateArticle = () => {
    form.post(
        route("article.update", {
            article: props.article.slug,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                titleRef.value.focus();
            },
        },
    );
};
const deletingArticle = ref<ArticleData | null>(null);
const deletingArticleTrigger = ref(false);

const openDeleteArticleModal = (article: ArticleData) => {
    deletingArticle.value = article;
    deletingArticleTrigger.value = true;
};

const closeDeleteArticleModal = () => {
    deletingArticle.value = null;
    deletingArticleTrigger.value = false;
};
</script>

<template>
    <Head title="Editar post" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="max-w-7xl mx-auto p-6 lg:p-8 bg-white">
                <div class="grid gap-6">
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
                            <InputError
                                :message="form.errors.short_description"
                            />
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
                                v-model="form.location"
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
                            <span
                                class="text-medium text-red-500 font-semibold"
                                >{{ form.errors.cover }}</span
                            >
                            <div
                                v-if="form.media && form.cover.length == 0"
                                class="rounded border border-dashed border-green-300 bg-green-100 dark:bg-green-800 flex flex-wrap p-0 my-4 gap-0 w-full"
                            >
                                <div class="flex items-center space-x-4 w-full">
                                    <div class="flex-shrink-0">
                                        <ResponsiveImage
                                            :responsive="
                                                form.media ?? undefined
                                            "
                                            class-name="shadow-2 !h-16 object-cover"
                                        />
                                    </div>
                                    <div class="flex-1 hidden sm:block sm:w-64">
                                        <p
                                            class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                        >
                                            {{ article.title }}
                                        </p>
                                    </div>

                                    <div class="flex-1 w-12"></div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white px-8"
                                    >
                                        <div role="status">
                                            <svg
                                                class="fillCurrent text-green-500 dark:text-green-50"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-green-400 dark:fill-green-50"
                                                    opacity="0.5"
                                                    d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z"
                                                />
                                                <path
                                                    class="fill-green-500 dark:fill-green-50"
                                                    d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                :options="{
                                    placeholder: 'Conteúdo',
                                }"
                                contentType="html"
                                theme="snow"
                                class="!h-fit"
                                toolbar="minimal"
                                v-model:content="form.content"
                            />
                            <InputError :message="form.errors.content" />
                        </div>
                    </div>
                    <div>
                        <button
                            @click="addSection"
                            class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                        >
                            <svg
                                class="w-5 h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="-4.5 -4.5 24 24"
                                fill="currentColor"
                            >
                                <path
                                    d="M8.9 6.9v-5a1 1 0 1 0-2 0v5h-5a1 1 0 1 0 0 2h5v5a1 1 0 1 0 2 0v-5h5a1 1 0 1 0 0-2h-5z"
                                ></path>
                            </svg>
                            <span class="mx-4"> Adicionar secção </span>
                        </button>
                    </div>
                    <div
                        v-for="(section, index) in form.sections"
                        :key="section.id ?? index"
                        class="grid gap-4 bg-red-50 p-6"
                    >
                        <button
                            @click="form.sections.splice(index, 1)"
                            class="flex items-center justify-center text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                        >
                            Remove
                        </button>
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
                            <div
                                v-if="
                                    section.media && section.cover.length == 0
                                "
                                class="rounded border border-dashed border-green-300 bg-green-100 dark:bg-green-800 flex flex-wrap p-0 my-4 gap-0 w-full"
                            >
                                <div class="flex items-center space-x-4 w-full">
                                    <div class="flex-shrink-0">
                                        <ResponsiveImage
                                            :responsive="
                                                section.media ?? undefined
                                            "
                                            class-name="shadow-2 !h-16 object-cover"
                                        />
                                    </div>
                                    <div class="flex-1 hidden sm:block sm:w-64">
                                        <p
                                            class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                        >
                                            {{ section.title }}
                                        </p>
                                    </div>

                                    <div class="flex-1 w-12"></div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white px-8"
                                    >
                                        <div role="status">
                                            <svg
                                                class="fillCurrent text-green-500 dark:text-green-50"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-green-400 dark:fill-green-50"
                                                    opacity="0.5"
                                                    d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z"
                                                />
                                                <path
                                                    class="fill-green-500 dark:fill-green-50"
                                                    d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="min-h-32">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="name"
                                >Conteúdo da secção
                            </label>
                            <QuillEditor
                                :options="{
                                    placeholder: 'Conteúdo',
                                }"
                                contentType="html"
                                theme="snow"
                                class="!h-fit"
                                toolbar="minimal"
                                v-model:content="section.content"
                            />
                        </div>
                    </div>
                    <div class="grid justify-items-end">
                        <button
                            class="fixed bottom-20 right-6 w-fit text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-bold rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            type="submit"
                            @click="openDeleteArticleModal(props.article)"
                        >
                            Excluir post
                        </button>
                        <button
                            class="fixed bottom-6 right-6 w-fit text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-bold rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            type="submit"
                            @click="updateArticle"
                        >
                            Actualizar post
                        </button>
                    </div>
                </div>
            </div>
            <DeleteArticle
                v-if="deletingArticle"
                :article="deletingArticle"
                :close="closeDeleteArticleModal"
                :open-modal="deletingArticleTrigger"
            />
        </template>
    </AuthenticatedLayout>
</template>
