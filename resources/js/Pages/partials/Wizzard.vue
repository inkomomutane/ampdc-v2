<script lang="ts" setup>
const props = defineProps({
    step: {
        type: Number,
        default: 1,
    },
});
</script>

<template>
    <div class="w-full py-6">
        <div class="flex">
            <div class="w-1/4">
                <div class="relative mb-2">
                    <div
                        class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center"
                    >
                        <span class="text-center text-white w-full">
                            <svg
                                class="w-full fill-current"
                                height="24"
                                viewBox="0 0 24 24"
                                width="24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    class="heroicon-ui"
                                    d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"
                                />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="text-xs text-center md:text-base">
                    Dados da vítima
                </div>
            </div>

            <div class="w-1/4">
                <div class="relative mb-2">
                    <div
                        class="absolute flex align-center items-center align-middle content-center"
                        style="
                            width: calc(100% - 2.5rem - 1rem);
                            top: 50%;
                            transform: translate(-50%, -50%);
                        "
                    >
                        <div
                            class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                        >
                            <div
                                class="w-0 py-1 rounded"
                                :class="{
                                    'bg-green-300': props.step > 1,
                                    'bg-gray-200': props.step < 5,
                                }"
                                style="width: 100%"
                            ></div>
                        </div>
                    </div>

                    <div
                        class="w-10 h-10 mx-auto  rounded-full text-lg  flex items-center"
                        :class="{
                            'bg-white text-gray-600 ': props.step < 2,
                            'bg-green-500 text-white': props.step < 5,
                        }"
                    >
                        <span class="text-center w-full" :class="{
                            'text-gray-400': props.step < 2,
                            'text-white': props.step < 5,
                        }">
                            <svg
                                class="w-full"
                                :class="{
                                    'fill-gray-600': props.step < 2,
                                    'fill-white': props.step < 5,
                                }"
                                height="20"
                                viewBox="0 0 20 18"
                                width="20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <g>
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.559Z"
                                    ></path>
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"
                                    ></path>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="text-xs text-center md:text-base">
                    Registar caso
                </div>
            </div>

            <div class="w-1/4">
                <div class="relative mb-2">
                    <div
                        class="absolute flex align-center items-center align-middle content-center"
                        style="
                            width: calc(100% - 2.5rem - 1rem);
                            top: 50%;
                            transform: translate(-50%, -50%);
                        "
                    >
                        <div
                            class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1"
                        >
                            <div
                                class="w-0 py-1 rounded"
                                :class="{
                                    'bg-green-300': props.step > 2,
                                    'bg-gray-200': props.step < 5,
                                }"
                                style="width: 100%"
                            ></div>
                        </div>
                    </div>

                    <div
                        class="w-10 h-10 mx-auto  border-2 border-gray-200 rounded-full text-lg  flex items-center"
                        :class="{
                            'bg-white text-gray-600 ': props.step < 3,
                            'bg-green-500 text-white': props.step < 5,
                        }"
                    >
                        <span class="text-center  w-full" :class="{
                            'text-gray-400': props.step < 3,
                            'text-white': props.step < 5,
                        }">
                            <svg
                                class="w-full"
                                :class="{
                                    'fill-gray-600': props.step < 3,
                                    'fill-white': props.step < 5,
                                }"
                                height="24"
                                viewBox="0 0 24 24"
                                width="24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    class="heroicon-ui"
                                    d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"
                                />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="text-xs text-center md:text-base">Concluído</div>
            </div>
        </div>
    </div>
</template>
