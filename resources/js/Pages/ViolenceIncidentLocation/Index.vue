<script lang="ts" setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";

import { ViolenceIncidentLocations } from "@/types/index";
import { PropType, ref, watch } from "vue";
import Flasher from "@/helprs";
import { FlasherResponse } from "@flasher/flasher";
import CreateViolenceIncidentLocation from "./CreateViolenceIncidentLocation.vue";
import DeleteViolenceIncidentLocation from "./DeleteViolenceIncidentLocation.vue";
import EditViolenceIncidentLocation from "@/Pages/ViolenceIncidentLocation/EditViolenceIncidentLocation.vue";

const props = defineProps({
    violenceIncidentLocations: {
        type: Object as PropType<ViolenceIncidentLocations>,
        required: true,
    },
    search: String,
    messages: Object as PropType<FlasherResponse>,
});

const links = ref(props.violenceIncidentLocations.links);

const editingViolenceIncidentLocationTrigger = ref(false);
const editingViolenceIncidentLocation =
    ref<App.Data.ViolenceIncidentLocationData | null>(null);

const deletingViolenceIncidentLocationTrigger = ref(false);
const deletingViolenceIncidentLocation =
    ref<App.Data.ViolenceIncidentLocationData | null>(null);

const searchTerm = ref("");

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
    {
        immediate: true,
        deep: true,
    },
);

watch(
    () => props.violenceIncidentLocations.links,
    (value) => {
        links.value = value;
    },
);

watch(searchTerm, (value) => {
    router.visit(
        route("violenceIncidentLocation.list", {
            search: value ?? "",
        }),
        {
            only: ["violenceIncidentLocations"],
            replace: false,
            preserveState: true,
        },
    );
});

function openEditViolenceIncidentLocationModal(
    violenceIncidentLocation: App.Data.ViolenceIncidentLocationData,
) {
    editingViolenceIncidentLocation.value = violenceIncidentLocation;
    editingViolenceIncidentLocationTrigger.value = true;
}

function closeEditViolenceIncidentLocationModal() {
    editingViolenceIncidentLocation.value = null;
    editingViolenceIncidentLocationTrigger.value = false;
}

function openDeleteViolenceIncidentLocationModal(
    violenceIncidentLocation: App.Data.ViolenceIncidentLocationData,
) {
    deletingViolenceIncidentLocation.value = violenceIncidentLocation;
    deletingViolenceIncidentLocationTrigger.value = true;
}

function closeDeleteViolenceIncidentLocationModal() {
    deletingViolenceIncidentLocation.value = null;
    deletingViolenceIncidentLocationTrigger.value = false;
}
</script>

<template>
    <Head title="Locais de violência" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="mx-auto max-w-screen-xl">
                <!-- Start coding here -->
                <div
                    class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded overflow-hidden"
                >
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
                    >
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label class="sr-only" for="simple-search"
                                    >Pesquisar</label
                                >
                                <div class="relative w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                    >
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor"
                                            viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                clip-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                fill-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        id="simple-search"
                                        v-model="searchTerm"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                        placeholder="Pesquisar..."
                                        type="text"
                                    />
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                        >
                            <CreateViolenceIncidentLocation />
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th class="px-4 py-3" scope="col">
                                        <div class="flex items-center">#</div>
                                    </th>
                                    <th class="px-4 py-3" scope="col">
                                        <div class="flex items-center">
                                            Nome
                                        </div>
                                    </th>

                                    <th class="px-4 py-3" scope="col">
                                        Editar
                                    </th>
                                    <th class="px-4 py-3" scope="col">
                                        Excluir
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="violenceIncidentLocation in violenceIncidentLocations.data"
                                    :key="
                                        violenceIncidentLocation.id ?? undefined
                                    "
                                    class="border-b dark:border-gray-700"
                                >
                                    <th
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        scope="row"
                                    >
                                        <span
                                            class="rounded-full bg-slate-50 text-black text-center"
                                        >
                                            {{
                                                violenceIncidentLocation.name?.charAt(
                                                    0,
                                                )
                                            }}
                                        </span>
                                    </th>

                                    <td class="px-4 py-3">
                                        {{ violenceIncidentLocation.name }}
                                    </td>
                                    <td class="px-4 py-3 w-32">
                                        <button
                                            class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                            type="button"
                                            @click="
                                                openEditViolenceIncidentLocationModal(
                                                    violenceIncidentLocation,
                                                )
                                            "
                                        >
                                            <svg
                                                fill="none"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                width="24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    class="fill-current text-gray-100"
                                                    clip-rule="evenodd"
                                                    d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                    fill="black"
                                                    fill-rule="evenodd"
                                                    opacity="0.3"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                    fill="black"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                    fill="black"
                                                />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="px-4 py-3 justify-end w-32">
                                        <button
                                            class="bg-red-500 hover:bg-red-700 flex items-center justify-center text-white focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                            type="button"
                                            @click="
                                                openDeleteViolenceIncidentLocationModal(
                                                    violenceIncidentLocation,
                                                )
                                            "
                                        >
                                            <svg
                                                aria-hidden="true"
                                                fill="currentColor"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                width="24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M21.07 5.23c-1.61-.16-3.22-.28-4.84-.37v-.01l-.22-1.3c-.15-.92-.37-2.3-2.71-2.3h-2.62c-2.33 0-2.55 1.32-2.71 2.29l-.21 1.28c-.93.06-1.86.12-2.79.21l-2.04.2c-.42.04-.72.41-.68.82.04.41.4.71.82.67l2.04-.2c5.24-.52 10.52-.32 15.82.21h.08c.38 0 .71-.29.75-.68a.766.766 0 00-.69-.82z"
                                                ></path>
                                                <path
                                                    d="M19.23 8.14c-.24-.25-.57-.39-.91-.39H5.68c-.34 0-.68.14-.91.39-.23.25-.36.59-.34.94l.62 10.26c.11 1.52.25 3.42 3.74 3.42h6.42c3.49 0 3.63-1.89 3.74-3.42l.62-10.25c.02-.36-.11-.7-.34-.95z"
                                                    opacity=".399"
                                                ></path>
                                                <path
                                                    clip-rule="evenodd"
                                                    d="M9.58 17a.75.75 0 01.75-.75h3.33a.75.75 0 010 1.5h-3.33a.75.75 0 01-.75-.75zM8.75 13a.75.75 0 01.75-.75h5a.75.75 0 010 1.5h-5a.75.75 0 01-.75-.75z"
                                                    fill-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav
                        aria-label="Table navigation"
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    >
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400"
                        >
                            Showing
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                                >{{
                                    `${
                                        violenceIncidentLocations.meta.from ?? 0
                                    }-${violenceIncidentLocations.meta.to ?? 0}`
                                }}</span
                            >
                            of
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                            >
                                {{ violenceIncidentLocations.meta.total }}</span
                            >
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li
                                v-if="links[0].active"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <Link
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    href=""
                                    >&laquo; Previous
                                </Link>
                            </li>
                            <li v-else>
                                <Link
                                    :href="links[0].url ?? ''"
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >&laquo; Previous
                                </Link>
                            </li>
                            <li
                                v-for="link in links.slice(1, -1)"
                                :key="link.label"
                            >
                                <Link
                                    v-if="!link.active"
                                    :href="link.url ?? ''"
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >{{ link.label }}
                                </Link>
                                <span
                                    v-else
                                    :class="`${
                                        link.active
                                            ? 'bg-gray-700 dark:bg-slate-600 text-white dark:text-slate-100'
                                            : ''
                                    }`"
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >{{ link.label }}</span
                                >
                            </li>
                            <li
                                v-if="links.slice(-1)[0].active"
                                class="disabled flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <span
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >Next &raquo;</span
                                >
                            </li>
                            <li
                                v-else
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <Link :href="links.slice(-1)[0].url ?? ''"
                                    >Next &raquo;
                                </Link>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <EditViolenceIncidentLocation
                v-if="editingViolenceIncidentLocation"
                :close="closeEditViolenceIncidentLocationModal"
                :openModal="editingViolenceIncidentLocationTrigger"
                :violenceIncidentLocation="editingViolenceIncidentLocation"
            />
            <DeleteViolenceIncidentLocation
                v-if="deletingViolenceIncidentLocation"
                :close="closeDeleteViolenceIncidentLocationModal"
                :openModal="deletingViolenceIncidentLocationTrigger"
                :violenceIncidentLocation="deletingViolenceIncidentLocation"
            />
        </template>
    </AuthenticatedLayout>
</template>
