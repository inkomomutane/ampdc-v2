<section
    class="bg-gradient-to-b from-red-50 via-amber-50 to-white xl:text-white dark:bg-gray-900"
>
    <div
        class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-32 lg:grid-cols-12"
    >
        <div class="mr-auto place-self-center lg:col-span-6 tracking-tight p-8">
            <h2
                class="max-w-2xl mb-4 text-2xl text-red-950 font-extrabold tracking-tight leading-none md:text-3xl xl:text-4xl dark:text-white first-letter:uppercase"
                data-aos="fade-down"
            >
                Observatório de Feminicídio
            </h2>
            <h1
                class="max-w-2xl mb-4 text-red-600 text-sm font-bold tracking-tight leading-none dark:text-white first-letter:uppercase"
                data-aos="fade-down"
            >
                — Unidos pela segurança e justiça
            </h1>

            <p
                class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-lg dark:text-gray-400 line-clamp-5"
                data-aos="fade-down"
            >
                Advogando sobre Direitos Humanos das Mulheres diante das
                instituições competentes a nível nacional de modo a prevenir,
                garantir segurança, protecção e obter resposta dos casos de
                feminicídio.
            </p>
            <a
                href="{{ route("about.us") }}"
                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-sm font-medium text-center bg-red-100 text-red-600 hover:bg-red-600 hover:text-white focus:ring-4 focus:ring-red-300 transition-transform transform-gpu duration-300 ease-in-out"
                data-aos="fade-down"
            >
                Ler mais
                <svg
                    class="w-4 h-4 ml-2 -mr-1"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-6 lg:flex">
            <div
                class="grid gap-2 items-center justify-items-center bg-transparent"
                data-aos="fade-left"
            >
                <img
                    class="h-full xl:h-[80%] object-cover object-top rounded hover:scale-105 transition-transform duration-500 ease-in-out"
                    src="{{ Vite::asset("resources/website/images/violence.jpg") }}"
                    alt="mockup"
                    data-aos="fade-left"
                />
            </div>
        </div>
    </div>
</section>
