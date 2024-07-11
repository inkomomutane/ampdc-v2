@extends("Website.Layouts.website")
@section("title", "Welcome")
@section("content")
    <nav
        class="border-gray-200 bg-white dark:bg-gray-900 text-sm sticky top-0 z-30"
    >
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <a href="/" class="flex items-center mx-6">
                <img
                    src="{{ Vite::asset("resources/website/images/logo.png") }}"
                    class="mr-3"
                    alt="Sumburero Logo"
                    width="40"
                    height="40"
                />
            </a>
            <div class="flex md:order-4 mr-8 !w-44">
                <div
                    id="google_translate_element"
                    class="!text-gray-600 !font-semibold"
                ></div>
            </div>

            <div class="flex md:order-3 self-start">
                <button
                    data-collapse-toggle="navbar-cta"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 md:hidden hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 17 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"
                        />
                    </svg>
                </button>
            </div>

            <div
                class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2"
                id="navbar-cta"
            >
                <ul
                    class="flex flex-col bg-white md:bg-transparent font-semibold tracking-tigher p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0"
                >
                    <li>
                        <a
                            href="{{ route("welcome") }}"
                            class="block py-2 pl-3 pr-4 @if (request()->routeIs("welcome"))
                                text-white
                                bg-red-700
                                md:bg-transparent
                                md:text-red-700
                                md:p-0
                            @else
                                text-gray-600
                                hover:bg-red-50
                                md:hover:bg-transparent
                                md:hover:text-red-700
                                md:p-0
                                md:dark:hover:text-red-500
                                dark:text-white
                                dark:hover:bg-gray-700
                                dark:hover:text-white
                                md:dark:hover:bg-transparent
                                dark:border-gray-700
                            @endif"
                            aria-current="page"
                        >
                            Início
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ request()->routeIs("news.page") ? "" : route("news") }}"
                            class="block py-2 pl-3 pr-4 @if (request()->routeIs("news") || request()->routeIs("news.page"))
                                text-white
                                bg-red-700
                                md:bg-transparent
                                md:text-red-700
                                md:p-0
                            @else
                                text-gray-600
                                hover:bg-red-50
                                md:hover:bg-transparent
                                md:hover:text-red-700
                                md:p-0
                                md:dark:hover:text-red-500
                                dark:text-white
                                dark:hover:bg-gray-700
                                dark:hover:text-white
                                md:dark:hover:bg-transparent
                                dark:border-gray-700
                            @endif"
                        >
                            Actividades
                        </a>
                    </li>

                    @if (request()->routeIs("event"))
                        <li>
                            <a
                                href=""
                                class="block py-2 pl-3 pr-4 @if (request()->routeIs("event"))
                                    text-white
                                    bg-red-700
                                    md:bg-transparent
                                    md:text-red-700
                                    md:p-0
                                @else
                                    text-gray-600
                                    hover:bg-red-50
                                    md:hover:bg-transparent
                                    md:hover:text-red-700
                                    md:p-0
                                    md:dark:hover:text-red-500
                                    dark:text-white
                                    dark:hover:bg-gray-700
                                    dark:hover:text-white
                                    md:dark:hover:bg-transparent
                                    dark:border-gray-700
                                @endif"
                            >
                                Evento
                            </a>
                        </li>
                    @endif

                    <li>
                        <a
                            href=""
                            class="block py-2 pl-3 pr-4 @if (request()->routeIs("about.us"))
                                text-white
                                bg-red-700
                                md:bg-transparent
                                md:text-red-700
                                md:p-0
                            @else
                                text-gray-600
                                hover:bg-red-50
                                md:hover:bg-transparent
                                md:hover:text-red-700
                                md:p-0
                                md:dark:hover:text-red-500
                                dark:text-white
                                dark:hover:bg-gray-700
                                dark:hover:text-white
                                md:dark:hover:bg-transparent
                                dark:border-gray-700
                            @endif"
                        >
                            Sobre-nós
                        </a>
                    </li>
                    <li>
                        <a
                            href=""
                            class="block py-2 pl-3 pr-4 @if (request()->routeIs("contact"))
                                text-white
                                bg-red-700
                                md:bg-transparent
                                md:text-red-700
                                md:p-0
                            @else
                                text-gray-600
                                hover:bg-red-50
                                md:hover:bg-transparent
                                md:hover:text-red-700
                                md:p-0
                                md:dark:hover:text-red-500
                                dark:text-white
                                dark:hover:bg-gray-700
                                dark:hover:text-white
                                md:dark:hover:bg-transparent
                                dark:border-gray-700
                            @endif"
                        >
                            Contactos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section
        class="bg-gradient-to-b from-red-50 via-amber-50 to-white  xl:text-white dark:bg-gray-900"
    >
        <div
            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-32 lg:grid-cols-12"
        >
            <div
                class="mr-auto place-self-center lg:col-span-6 tracking-tight p-8"
            >
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
                    instituições competentes a nível nacional de modo a
                    prevenir, garantir segurança, protecção e obter resposta dos
                    casos de feminicídio.
                </p>
                <a
                    href=""
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-sm font-medium text-center bg-red-100 text-red-600 hover:bg-red-600 hover:text-white focus:ring-4 focus:ring-red-300
                    transition-transform transform-gpu  duration-300 ease-in-out
                    "
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
    <section
        class="bg-gradient-to-b from-red-50 to-white dark:bg-gray-900"
    >
        <div
            class="grid md:grid-cols-2 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-32  items-center"
        >
          <div class="">
              <img
                  class="h-full object-cover object-top rounded hover:scale-105 transition-transform duration-500 ease-in-out"
                  src="{{ Vite::asset("resources/website/images/observatorio.jpeg") }}"
                  alt="mockup"
                  data-aos="fade-right"
              />
          </div>
          <div class="bg-white p-8 h-fit md:-ml-32 z-10 ">
              <h1 class="font-extrabold text-3xl mb-2">Quem Somos</h1>
              <p class="py-2">
                  Somos resultado de movimentos feministas em Moçambique em repúdio ao fenômeno da violência contra mulheres que nos últimos tempos passou a ser reconhecido como problema social que necessita de políticas públicas e envolvimento de diferentes setores e seguimentos sociais para o seu enfrentamento.
              </p>
              <a
                  href=""
                  class="inline-flex items-center justify-center px-5 py-3 mr-3 text-sm font-medium text-center bg-red-500 text-white hover:bg-red-700  focus:ring-4 focus:ring-red-300
                    transition-transform transform-gpu  duration-300 ease-in-out
                    "
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
        </div>
    </section>
    <section
        class="bg-gradient-to-b from-white  via-red-100 to-red-400 dark:bg-gray-900"
    >
        <div
            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-32  justify-items-center"
        >
            <ul class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 ">
                <li>
                    <article class="group bg-white h-full flex flex-col justify-start rounded-t aos-init aos-animate" data-aos="fade-up">
                        <div class=" !min-h-[10rem] object-cover mb-2 rounded-t text-white bg-red-500 flex items-center justify-center" >
                            <svg class="w-40 h-40 p-6 text-current "viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M21.4172 18.5828C19.3962 19.5481 18 21.6109 18 23.9999C18 27.3136 20.6863 29.9999 24 29.9999C26.389 29.9999 28.4519 28.6037 29.4172 26.5828" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M28.2793 11.7207C26.9392 11.2538 25.4992 11 24 11C16.8203 11 11 16.8203 11 24C11 31.1797 16.8203 37 24 37C31.1797 37 37 31.1797 37 24C37 22.5008 36.7462 21.0608 36.2793 19.7207" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M33.5675 6.43255C30.7255 4.88151 27.4657 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.5343 43.1185 17.2745 41.5675 14.4325" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M44 4L24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                        <header class="text-red-700 px-4 ">
                            <h2 class="line-clamp-1 text-xl font-bold tracking-wide">
                                Missão
                            </h2>
                        </header>
                        <p class=" my-2 mb-6 text-sm px-4">
                            Advogar sobre Direitos Humanos das Mulheres diante das instituições competentes a nível nacional de modo a prevenir, garantir segurança, protecção e obter resposta dos casos de feminicídio.
                        </p>
                    </article>
                </li>
                <li>
                    <article class="group bg-white h-full flex flex-col justify-start rounded-t aos-init aos-animate" data-aos="fade-up">
                        <div class=" !min-h-[10rem] object-cover mb-2 rounded-t text-white bg-red-500 flex items-center justify-center" >
                            <svg class="w-40 h-40 p-6 text-current "viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M21.4172 18.5828C19.3962 19.5481 18 21.6109 18 23.9999C18 27.3136 20.6863 29.9999 24 29.9999C26.389 29.9999 28.4519 28.6037 29.4172 26.5828" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M28.2793 11.7207C26.9392 11.2538 25.4992 11 24 11C16.8203 11 11 16.8203 11 24C11 31.1797 16.8203 37 24 37C31.1797 37 37 31.1797 37 24C37 22.5008 36.7462 21.0608 36.2793 19.7207" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M33.5675 6.43255C30.7255 4.88151 27.4657 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.5343 43.1185 17.2745 41.5675 14.4325" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M44 4L24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        <header class="text-red-700 px-4 ">
                            <h2 class="line-clamp-1 text-xl font-bold tracking-wide">
                                Visão
                            </h2>
                        </header>
                        <p class=" my-2 mb-6 text-sm px-4">
                            Ver a sociedade moçambicana com um futuro sem feminicídio, com leis justas e transparentes.
                        </p>
                    </article>
                </li>
                <li>
                    <article class="group bg-white h-full flex flex-col justify-start rounded-t aos-init aos-animate" data-aos="fade-up">
                        <div class=" !min-h-[10rem] object-cover mb-2 rounded-t text-white bg-red-500 flex items-center justify-center" >
                            <svg class="w-40 h-40 p-6 text-current " viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M21.4172 18.5828C19.3962 19.5481 18 21.6109 18 23.9999C18 27.3136 20.6863 29.9999 24 29.9999C26.389 29.9999 28.4519 28.6037 29.4172 26.5828" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M28.2793 11.7207C26.9392 11.2538 25.4992 11 24 11C16.8203 11 11 16.8203 11 24C11 31.1797 16.8203 37 24 37C31.1797 37 37 31.1797 37 24C37 22.5008 36.7462 21.0608 36.2793 19.7207" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M33.5675 6.43255C30.7255 4.88151 27.4657 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.5343 43.1185 17.2745 41.5675 14.4325" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M44 4L24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        <header class="text-red-700 px-4 ">
                            <h2 class="line-clamp-1 text-xl font-bold tracking-wide">
                                Objectivos
                            </h2>
                        </header>
                        <p class=" my-2 mb-6 text-sm px-4">
                            Favorecer um espaço interdisciplinar de reflexão e de proposituras para o enfrentamento do crime de feminicídio e no país.
                         </p>
                    </article>
                </li>
            </ul>
        </div>
    </section>
    <section
        class="bg-white  dark:bg-gray-900"
    >
        <div
            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-32  justify-items-center"
        >
            Lorem ip
        </div>
    </section>
@endsection
