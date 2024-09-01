<template>
    <!--    -->
    <SidebarLinkGroup
        :class-options="
            isActive()
                ? 'bg-gray-900  text-gray-100  border-l-white border-l-2 rounded-l-none'
                : ''
        "
        :dropdown-open-state="isActive()"
        class="cursor-pointer"
    >
        <template v-slot:title>
            <div class="flex grow items-center">
                <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    stroke="none"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"
                    ></path>
                    <path
                        d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"
                    ></path>
                </svg>
                <span
                    class="ml-2 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100"
                    >{{ "Definições" }}</span
                >
            </div>
        </template>
        <template v-slot:content>
            <div class="mt-5">
                <SidebarLink
                    :active="route().current('perpetrator.list')"
                    :authorized="true"
                    :href="route('perpetrator.list')"
                    title="Perpetradores"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 32 32"
                            fill="currentColor"
                        >
                            <defs></defs>
                            <title>person</title>
                            <path
                                d="M18,30H14a2,2,0,0,1-2-2V21a2,2,0,0,1-2-2V13a3,3,0,0,1,3-3h6a3,3,0,0,1,3,3v6a2,2,0,0,1-2,2v7A2,2,0,0,1,18,30ZM13,12a.94.94,0,0,0-1,1v6h2v9h4V19h2V13a.94.94,0,0,0-1-1Z"
                            ></path>
                            <path
                                d="M16,9a4,4,0,1,1,4-4h0A4,4,0,0,1,16,9Zm0-6a2,2,0,1,0,2,2h0a2,2,0,0,0-2-2Z"
                            ></path>
                            <rect
                                id="_Transparent_Rectangle_"
                                data-name="<Transparent Rectangle>"
                                class="cls-1"
                                width="32"
                                height="32"
                                style="fill: none"
                            ></rect>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('supposedReasonOfViolence.list')"
                    :authorized="true"
                    :href="route('supposedReasonOfViolence.list')"
                    title="Motivos de violência"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            stroke="none"
                        >
                            <path
                                d="M12,11a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0V12A1,1,0,0,0,12,11Zm0-3a1,1,0,1,0,1,1A1,1,0,0,0,12,8Zm0-6A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('violenceIncidentLocation.list')"
                    :authorized="true"
                    :href="route('violenceIncidentLocation.list')"
                    title="Locais de violência"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path
                                d="M18.5 10.2c0 2.57-2.1 5.79-6.16 9.51l-.34.3-.34-.31C7.6 15.99 5.5 12.77 5.5 10.2c0-3.84 2.82-6.7 6.5-6.7s6.5 2.85 6.5 6.7z"
                                fill-opacity=".3"
                            ></path>
                            <path
                                d="M12 2c4.2 0 8 3.22 8 8.2 0 3.32-2.67 7.25-8 11.8-5.33-4.55-8-8.48-8-11.8C4 5.22 7.8 2 12 2zm6 8.2C18 6.57 15.35 4 12 4s-6 2.57-6 6.2c0 2.34 1.95 5.44 6 9.14 4.05-3.7 6-6.8 6-9.14zM12 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('violenceType.list')"
                    :authorized="true"
                    :href="route('violenceType.list')"
                    title="Tipos de violência"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.47.22A.75.75 0 015 0h6a.75.75 0 01.53.22l4.25 4.25c.141.14.22.331.22.53v6a.75.75 0 01-.22.53l-4.25 4.25A.75.75 0 0111 16H5a.75.75 0 01-.53-.22L.22 11.53A.75.75 0 010 11V5a.75.75 0 01.22-.53L4.47.22zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5H5.31zM8 4a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 018 4zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('user.all')"
                    :authorized="true"
                    :href="route('user.all')"
                    title="Usuários"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                cx="7.5"
                                cy="6.5"
                                r="3.5"
                                opacity=".35"
                                fill="currentColor"
                            ></circle>
                            <circle
                                cx="16.5"
                                cy="6.5"
                                r="3.5"
                                opacity=".35"
                                fill="currentColor"
                            ></circle>
                            <path
                                d="M10.5,14h8c1.93,0,3.5,1.57,3.5,3.5S20.43,21,18.5,21h-8V14z"
                                opacity=".35"
                                fill="currentColor"
                            ></path>
                            <path
                                d="M14,17.5c0,1.93-1.57,3.5-3.5,3.5h-5c-0.96,0-1.84-0.39-2.47-1.03C2.39,19.34,2,18.46,2,17.5C2,15.57,3.57,14,5.5,14h5c0.96,0,1.84,0.39,2.47,1.03C13.61,15.66,14,16.54,14,17.5z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('organization.list')"
                    :authorized="true"
                    :href="route('organization.list')"
                    title="Organizações"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1"
                            viewBox="0 0 36 36"
                            preserveAspectRatio="xMidYMid meet"
                            fill="currentColor"
                        >
                            <title>organization-solid</title>
                            <polygon
                                points="9.8 18.8 26.2 18.8 26.2 21.88 27.8 21.88 27.8 17.2 18.8 17.2 18.8 14 17.2 14 17.2 17.2 8.2 17.2 8.2 21.88 9.8 21.88 9.8 18.8"
                                class="clr-i-solid clr-i-solid-path-1"
                            ></polygon>
                            <rect
                                x="2"
                                y="23"
                                width="14"
                                height="10"
                                rx="2"
                                ry="2"
                                class="clr-i-solid clr-i-solid-path-2"
                            ></rect>
                            <rect
                                x="20"
                                y="23"
                                width="14"
                                height="10"
                                rx="2"
                                ry="2"
                                class="clr-i-solid clr-i-solid-path-3"
                            ></rect>
                            <rect
                                x="11"
                                y="3"
                                width="14"
                                height="10"
                                rx="2"
                                ry="2"
                                class="clr-i-solid clr-i-solid-path-4"
                            ></rect>
                            <rect
                                x="0"
                                y="0"
                                width="36"
                                height="36"
                                fill-opacity="0"
                            ></rect>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('province.list')"
                    :authorized="true"
                    :href="route('province.list')"
                    title="Províncias"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 1.99609C12.4142 1.99609 12.75 2.33188 12.75 2.74609V3.99939H14.75C15.7165 3.99939 16.5 4.78289 16.5 5.74939V10.9994H18.75C19.7165 10.9994 20.5 11.7829 20.5 12.7494V20.2494C20.5 21.2159 19.7165 21.9994 18.75 21.9994H9.75452L9.75 21.9994H5.25C4.2835 21.9994 3.5 21.2159 3.5 20.2494V11.82C3.5 11.2011 3.82689 10.6283 4.35972 10.3134L7.5 8.45776V5.74939C7.5 4.78289 8.2835 3.99939 9.25 3.99939H11.25V2.74609C11.25 2.33188 11.5858 1.99609 12 1.99609ZM9 8.01784C9.8097 8.13784 10.5 8.82442 10.5 9.75181V20.4994H13.5V12.7494C13.5 11.8678 14.1519 11.1384 15 11.0171V5.74939C15 5.61132 14.8881 5.49939 14.75 5.49939H12.0094L12 5.49945L11.9906 5.49939H9.25C9.11193 5.49939 9 5.61132 9 5.74939V8.01784ZM15.25 12.4994C15.1119 12.4994 15 12.6113 15 12.7494V20.4994H18.75C18.8881 20.4994 19 20.3875 19 20.2494V12.7494C19 12.6113 18.8881 12.4994 18.75 12.4994H15.25ZM8.62282 9.53658L5.12282 11.6048C5.0467 11.6498 5 11.7316 5 11.82V20.2494C5 20.3875 5.11193 20.4994 5.25 20.4994H9V9.75181C9 9.55824 8.78947 9.4381 8.62282 9.53658Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('district.list')"
                    :authorized="true"
                    :href="route('district.list')"
                    title="Distritos"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 1.99609C12.4142 1.99609 12.75 2.33188 12.75 2.74609V3.99939H14.75C15.7165 3.99939 16.5 4.78289 16.5 5.74939V10.9994H18.75C19.7165 10.9994 20.5 11.7829 20.5 12.7494V20.2494C20.5 21.2159 19.7165 21.9994 18.75 21.9994H9.75452L9.75 21.9994H5.25C4.2835 21.9994 3.5 21.2159 3.5 20.2494V11.82C3.5 11.2011 3.82689 10.6283 4.35972 10.3134L7.5 8.45776V5.74939C7.5 4.78289 8.2835 3.99939 9.25 3.99939H11.25V2.74609C11.25 2.33188 11.5858 1.99609 12 1.99609ZM9 8.01784C9.8097 8.13784 10.5 8.82442 10.5 9.75181V20.4994H13.5V12.7494C13.5 11.8678 14.1519 11.1384 15 11.0171V5.74939C15 5.61132 14.8881 5.49939 14.75 5.49939H12.0094L12 5.49945L11.9906 5.49939H9.25C9.11193 5.49939 9 5.61132 9 5.74939V8.01784ZM15.25 12.4994C15.1119 12.4994 15 12.6113 15 12.7494V20.4994H18.75C18.8881 20.4994 19 20.3875 19 20.2494V12.7494C19 12.6113 18.8881 12.4994 18.75 12.4994H15.25ZM8.62282 9.53658L5.12282 11.6048C5.0467 11.6498 5 11.7316 5 11.82V20.2494C5 20.3875 5.11193 20.4994 5.25 20.4994H9V9.75181C9 9.55824 8.78947 9.4381 8.62282 9.53658Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
                <SidebarLink
                    :active="route().current('neighborhood.list')"
                    :authorized="true"
                    :href="route('neighborhood.list')"
                    title="Bairros"
                >
                    <template v-slot:icon>
                        <svg
                            class="w-4 h-4"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M9 19H12V12.9416L8 9.45402L4 12.9416V19H7V15H9V19ZM21 21H3C2.44772 21 2 20.5523 2 20V12.4868C2 12.1978 2.12501 11.9229 2.34282 11.733L6 8.54435V4C6 3.44772 6.44772 3 7 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21ZM16 11V13H18V11H16ZM16 15V17H18V15H16ZM16 7V9H18V7H16ZM12 7V9H14V7H12Z"
                            ></path>
                        </svg>
                    </template>
                </SidebarLink>
            </div>
        </template>
    </SidebarLinkGroup>
</template>
<script lang="ts" setup>
import SidebarLinkGroup from "@/components/SidebarLinkGroup.vue";
import SidebarLink from "@/components/SidebarLink.vue";
import { routerCheck } from "@/helprs";
import { Link } from "@inertiajs/vue3";
const isActive = () =>
    routerCheck([
        "perpetrator.list",
        "supposedReasonOfViolence.list",
        "violenceIncidentLocation.list",
        "violenceType.list",
        "user.all",
        "organization.list",
        "province.list",
        "district.list",
        "neighborhood.list",
    ]);
</script>
