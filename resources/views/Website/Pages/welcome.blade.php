@extends("Website.Layouts.website")
@section('seo')
    {!! seo($seoData) !!}
@endsection
@push('scripts')
    @vite('resources/website/js/reports.ts')
@endpush
@section("content")
    @include("Website.partials.hero")
    <section class="bg-gradient-to-b from-red-50 to-white dark:bg-gray-900">
        <div
            class="grid md:grid-cols-2 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 items-center"
        >
            <div class="">
                <img
                    class="h-full object-cover object-top rounded hover:scale-105 transition-transform duration-500 ease-in-out"
                    src="{{ Vite::asset("resources/website/images/observatorio.jpeg") }}"
                    alt="mockup"
                    data-aos="fade-right"
                />
            </div>
            <div class="bg-white p-8 h-fit md:-ml-32 z-10">
                <h1 class="font-extrabold text-3xl mb-2">Quem Somos</h1>
                <p class="py-2">
                    Somos resultado de movimentos feministas em Moçambique em
                    repúdio ao fenômeno da violência contra mulheres que nos
                    últimos tempos passou a ser reconhecido como problema social
                    que necessita de políticas públicas e envolvimento de
                    diferentes setores e seguimentos sociais para o seu
                    enfrentamento.
                </p>
                <a
                    href=""
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-sm font-medium text-center bg-red-500 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition-transform transform-gpu duration-300 ease-in-out"
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
    <section class="bg-gradient-to-b from-white to-red-200 dark:bg-gray-900">
        <div
            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-center"
        >
            <ul class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
                <li>
                    <article
                        class="group bg-white h-full flex flex-col justify-start rounded-t aos-init aos-animate"
                        data-aos="fade-up"
                    >
                        <div
                            class="!min-h-[10rem] object-cover mb-2 rounded-t text-white bg-red-500 flex items-center justify-center"
                        >
                            <svg
                                class="w-40 h-40 p-6 text-current"
                                viewBox="0 0 48 48"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    width="48"
                                    height="48"
                                    fill="white"
                                    fill-opacity="0.01"
                                ></rect>
                                <path
                                    d="M21.4172 18.5828C19.3962 19.5481 18 21.6109 18 23.9999C18 27.3136 20.6863 29.9999 24 29.9999C26.389 29.9999 28.4519 28.6037 29.4172 26.5828"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M28.2793 11.7207C26.9392 11.2538 25.4992 11 24 11C16.8203 11 11 16.8203 11 24C11 31.1797 16.8203 37 24 37C31.1797 37 37 31.1797 37 24C37 22.5008 36.7462 21.0608 36.2793 19.7207"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M33.5675 6.43255C30.7255 4.88151 27.4657 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.5343 43.1185 17.2745 41.5675 14.4325"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M44 4L24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </div>
                        <header class="text-red-700 px-4">
                            <h2
                                class="line-clamp-1 text-xl font-bold tracking-wide"
                            >
                                Missão
                            </h2>
                        </header>
                        <p class="my-2 mb-6 text-sm px-4">
                            Advogar sobre Direitos Humanos das Mulheres diante
                            das instituições competentes a nível nacional de
                            modo a prevenir, garantir segurança, protecção e
                            obter resposta dos casos de feminicídio.
                        </p>
                    </article>
                </li>
                <li>
                    <article
                        class="group bg-white h-full flex flex-col justify-start rounded-t aos-init aos-animate"
                        data-aos="fade-up"
                    >
                        <div
                            class="!min-h-[10rem] object-cover mb-2 rounded-t text-white bg-red-500 flex items-center justify-center"
                        >
                            <svg
                                class="w-40 h-40 p-6 text-current"
                                viewBox="0 0 48 48"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    width="48"
                                    height="48"
                                    fill="white"
                                    fill-opacity="0.01"
                                ></rect>
                                <path
                                    d="M21.4172 18.5828C19.3962 19.5481 18 21.6109 18 23.9999C18 27.3136 20.6863 29.9999 24 29.9999C26.389 29.9999 28.4519 28.6037 29.4172 26.5828"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M28.2793 11.7207C26.9392 11.2538 25.4992 11 24 11C16.8203 11 11 16.8203 11 24C11 31.1797 16.8203 37 24 37C31.1797 37 37 31.1797 37 24C37 22.5008 36.7462 21.0608 36.2793 19.7207"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M33.5675 6.43255C30.7255 4.88151 27.4657 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.5343 43.1185 17.2745 41.5675 14.4325"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M44 4L24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </div>
                        <header class="text-red-700 px-4">
                            <h2
                                class="line-clamp-1 text-xl font-bold tracking-wide"
                            >
                                Visão
                            </h2>
                        </header>
                        <p class="my-2 mb-6 text-sm px-4">
                            Ver a sociedade moçambicana com um futuro sem
                            feminicídio, com leis justas e transparentes.
                        </p>
                    </article>
                </li>
                <li>
                    <article
                        class="group bg-white h-full flex flex-col justify-start rounded-t aos-init aos-animate"
                        data-aos="fade-up"
                    >
                        <div
                            class="!min-h-[10rem] object-cover mb-2 rounded-t text-white bg-red-500 flex items-center justify-center"
                        >
                            <svg
                                class="w-40 h-40 p-6 text-current"
                                viewBox="0 0 48 48"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    width="48"
                                    height="48"
                                    fill="white"
                                    fill-opacity="0.01"
                                ></rect>
                                <path
                                    d="M21.4172 18.5828C19.3962 19.5481 18 21.6109 18 23.9999C18 27.3136 20.6863 29.9999 24 29.9999C26.389 29.9999 28.4519 28.6037 29.4172 26.5828"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M28.2793 11.7207C26.9392 11.2538 25.4992 11 24 11C16.8203 11 11 16.8203 11 24C11 31.1797 16.8203 37 24 37C31.1797 37 37 31.1797 37 24C37 22.5008 36.7462 21.0608 36.2793 19.7207"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M33.5675 6.43255C30.7255 4.88151 27.4657 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 20.5343 43.1185 17.2745 41.5675 14.4325"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M44 4L24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </div>
                        <header class="text-red-700 px-4">
                            <h2
                                class="line-clamp-1 text-xl font-bold tracking-wide"
                            >
                                Objectivos
                            </h2>
                        </header>
                        <p class="my-2 mb-6 text-sm px-4">
                            Favorecer um espaço interdisciplinar de reflexão e
                            de proposituras para o enfrentamento do crime de
                            feminicídio e no país.
                        </p>
                    </article>
                </li>
            </ul>
        </div>
    </section>
    <section class="bg-gradient-to-b from-red-200 to-white dark:bg-gray-900">
        <div
            class="grid grid-cols-3 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-center"
        >
            <div data-aos="fade-up" id="anualChart" class="w-full col-span-3"></div>
        </div>

    </section>
    <section class="bg-gradient-to-b from-white via-red-50 to-white dark:bg-gray-900">
        <div
            class="grid grid-cols-3 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-center"
        >
            <div data-aos="fade-up" id="chart" class="w-full col-span-3"></div>
        </div>

    </section>
    <section>
        <div
            class="grid grid-cols-2 md:grid-cols-3 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-center"
        >
            <div data-aos="fade-up" id="radial"></div>
            <div data-aos="fade-up" id="radial2"></div>
            <div data-aos="fade-up" id="radial3"></div>
        </div>
    </section>

    <section
        class="bg-gradient-to-b from-white via-red-200 to-red-500 dark:bg-gray-900"
    >
        <div
            class="max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:p-16"
        >
            <h1
                class="mb-4 text-red-600 text-sm font-extrabold tracking-tight leading-none dark:text-white capitalize text-center"
                data-aos="fade-up"
            >
                — Post's
            </h1>
            <h2
                class="mb-2 text-zinc-700 tracking-tight leading-none text-center first-letter:uppercase"
                data-aos="fade-up"
            >
                actividades realizadas recentemente.
            </h2>
            <div class="splide" id="news">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($articles as $article)
                            <li class="splide__slide py-12">
                                <a
                                    href="{{ route("news.page", ["article" => $article->slug]) }}"
                                >
                                    <article
                                        class="group bg-white h-full flex flex-col justify-start rounded-t"
                                        data-aos="fade-up"
                                    >
                                        @if (!$article->cover)
                                            <img
                                                src="{{Vite::asset('resources/images/placeholder.svg')}}"
                                                alt="{{ $article->title }}"
                                                class="!h-[15rem] !sm:h-[12rem] object-cover mb-2 rounded-t"
                                            />
                                        @else
                                        {{ $article->cover?->img()?->attributes(["class" => "!h-[15rem] !sm:h-[12rem] object-cover mb-2 rounded-t"]) }}
                                        @endif
                                        <header class="text-gray-600 px-4">
                                            <div
                                                class="text-xs font-bold text-white capitalize bg-red-500 p-1 px-2 mb-2 w-fit"
                                            >
                                                {{ $article->posted_at->format("d M, Y") }}
                                            </div>
                                            <h2
                                                class="line-clamp-1 text-red-600 text-sm font-bold tracking-wide"
                                            >
                                                {{ $article->title }}
                                            </h2>
                                        </header>
                                        <div
                                            class="line-clamp-3 my-2 text-sm px-4"
                                        >
                                            {!!  $article->content !!}
                                        </div>
                                        <span
                                            class="group-hover:text-primary-500 inline-flex self-start items-center justify-center font-bold text-center text-xs p-4 right-0"
                                        >
                                            Ler mais
                                            <svg
                                                class="w-3 h-3 ml-2 -mr-1"
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
                                        </span>
                                    </article>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex justify-end">
                <a
                    data-aos="fade-up"
                    href="{{ route("news") }}"
                    class="inline-flex place-self-center items-center justify-center py-3 text-sm font-medium text-center px-5 bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-500 focus:ring-4 focus:ring-red-600"
                >
                    Ver todas actividades
                    <svg
                        class="w-3 h-3 ml-2 -mr-1"
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
    @include("Website.partials.partners")
@endsection

@push("scripts")

@endpush
