<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { VictimCasesHistories } from "@/types";
import { ref, watch, PropType } from "vue";
import Flasher from "@/helprs";
import { FlasherResponse } from "@flasher/flasher";
import {CaseProgressStatus} from "@/types/casestatus";


const props = defineProps({
    cases: {
        type: Object as PropType<VictimCasesHistories>,
        required: true,
    },
    search: String,
    messages: Object as PropType<FlasherResponse>,
});

const links = ref(props.cases.links);

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
);

watch(
    () => props.cases.links,
    (value) => {
        links.value = value;
    },
);

watch(searchTerm, (value) => {
    router.visit(
        route("victim.cases.list", {
            search: value ?? "",
        }),
        {
            only: ["cases"],
            replace: false,
            preserveState: true,
        },
    );
});

const progressCasesColor = (status: CaseProgressStatus)  => {

    switch (status) {
        case CaseProgressStatus.FORWARDED:
            return "bg-blue-500";
        case CaseProgressStatus.PENDING:
            return "bg-yellow-500";
        case CaseProgressStatus.IN_PROGRESS:
            return "bg-blue-500";
        case CaseProgressStatus.SOLVED:
            return "bg-green-500";
        case CaseProgressStatus.CLOSED:
            return "bg-red-500";
        case CaseProgressStatus.REJECTED:
            return "bg-red-500";
        default:
            return "bg-gray-500";
    }
};

const exportCases = () => {

    if(route().current("victim.cases.list")){
        window.open(route("export.victims.cases",{
            type: "cases"
        }));
    }
    if(route().current("victim.forwarded.cases.list")){
        window.open(route("export.victims.cases",{
            type: "forwarded"
        }));
    }else if(route().current("victim.received.cases.list")){
        window.open(route("export.victims.cases",{
            type: "received"
        }));
    }
};
</script>
<template>
    <Head title="Províncias" />
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
                                <label for="simple-search" class="sr-only"
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
                                                fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="simple-search"
                                        v-model="searchTerm"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                        placeholder="Pesquisar..."
                                    />
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                        >
                            <button
                                class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"

                                @click="exportCases"
                            >
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512" fill="currentColor"><path d="M453.546814,273.4485474h-81.4267578l0.000061-40.7133179h81.4266968V273.4485474z M453.546814,296.7133179h-81.4266968l-0.000061,40.7133789h81.4267578V296.7133179z M453.546814,104.7789307h-81.4266968l-0.000061,40.7133789h81.4267578V104.7789307z M453.546814,168.7570801h-81.4266968l-0.000061,40.7133789h81.4267578V168.7570801z M453.546814,360.6914673h-81.4266968l-0.000061,40.7133789h81.4267578V360.6914673z M509.7894897,440.9549561c-2.3264771,12.0977173-16.8670044,12.3884888-26.5800171,12.7956543h-180.883606v52.3457031h-36.1185913L0,459.5667725V52.491333L267.7775879,5.9036255h34.5482178v46.3553734L476.986084,52.258667c9.8294067,0.4071655,20.647522-0.2907715,29.1973267,5.5835571C512.1740723,66.4501953,511.5928345,77.3846436,512,87.2722168l-0.2330322,302.7910767C511.4761353,406.9884033,513.3373413,424.2625122,509.7894897,440.9549561z M213.2798462,349.6988525c-16.0526733-32.5706787-32.3961792-64.9087524-48.3907471-97.4794312c15.8200684-31.6982422,31.4074707-63.5128174,46.9367065-95.3273926c-13.2027588,0.6397705-26.4055176,1.4540405-39.5501099,2.3846436c-9.8293457,23.9046021-21.2872925,47.1693726-28.9646606,71.8881836c-7.1539307-23.322937-16.6343384-45.7734375-25.300415-68.5147705c-12.7956543,0.697937-25.5912476,1.4540405-38.3869019,2.210144c13.4935913,29.7789307,27.8595581,59.1506958,40.9459839,89.104126c-15.4129028,29.0809326-29.8370361,58.5690308-44.784668,87.8245239c12.7374268,0.5234375,25.4749146,1.046875,38.2124023,1.2213745c9.0732422-23.1484375,20.3566895-45.4244995,28.2666626-69.038208c7.0957642,25.3585815,19.1353149,48.7978516,29.0228271,73.0513916C185.3039551,348.012207,199.2628174,348.8846436,213.2798462,349.6988525z M484.2601929,79.8817749H302.3258057l-0.000061,24.8971558h46.529541v40.7133789h-46.529541v23.2647705h46.529541v40.7133789h-46.529541v23.2647705h46.529541v40.7133179h-46.529541v23.2647705h46.529541v40.7133789h-46.529541v23.2647705h46.529541v40.7133789h-46.529541v26.8971558h181.9344482V79.8817749z"></path></svg> <span class="mx-4">Baixar a base em excel</span>
                                </button>
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
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">
                                            Nome da vítima
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
                                        Editar
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Excluir
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="border-b dark:border-gray-700"
                                    v-for="victimCase in cases.data"
                                    :key="victimCase.id ?? ''"
                                >
                                    <td class="px-4 py-3">
                                        {{ victimCase.victim.name }}
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
                                        <button
                                            type="button"
                                            class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-current text-gray-100"
                                                    opacity="0.3"
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                    fill="black"
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
                                            type="button"
                                            class="flex items-center justify-center text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation"
                    >
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400"
                        >
                            Showing
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                                >{{
                                    `${cases.meta.from ?? 0}-${
                                        cases.meta.to ?? 0
                                    }`
                                }}</span
                            >
                            of
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                            >
                                {{ cases.meta.total }}</span
                            >
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li
                                v-if="links[0].active"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <Link
                                    href=""
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >&laquo; Previous</Link
                                >
                            </li>
                            <li v-else>
                                <Link
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    :href="links[0].url ?? ''"
                                    >&laquo; Previous</Link
                                >
                            </li>
                            <li
                                v-for="link in links.slice(1, -1)"
                                :key="link.label"
                            >
                                <Link
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    v-if="!link.active"
                                    :href="link.url ?? ''"
                                    >{{ link.label }}
                                </Link>
                                <span
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    v-else
                                    :class="`${
                                        link.active
                                            ? 'bg-gray-700 dark:bg-slate-600 text-white dark:text-slate-100'
                                            : ''
                                    }`"
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
                                    >Next &raquo;</Link
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
