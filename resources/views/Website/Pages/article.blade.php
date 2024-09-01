@extends("Website.Layouts.website")
@section("seo")
    {!! seo()->for($article) !!}
@endsection

@push("scripts")
    @vite("resources/website/js/lightbox.ts")
@endpush

@section("content")
    <section
        class="bg-white md:bg-gradient-to-b md:from-red-200 md:via-white md:to-white"
    >
        <div
            class="max-w-screen-xl md:px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16"
        >
            <div
                class="mr-auto place-self-center lg:col-span-6 tracking-tight px-4 md:px-8"
            >
                <div class="grid gap-4 w-full" data-aos="fade-up">
                    <div class="grid w-full h-fit relative">
                        <a
                            href="{{ $article->cover->original_url }}"
                            data-glightbox="description: .desc_article ;descPosition: left "
                            class="gallery relative min-h-72 max-h-72 xl:min-h-96 xl:max-h-96 flex items-end text-white"
                            data-sizes="(max-width: 480px) 100vw, (max-width: 768px) 80vw, (max-width: 1024px) 70vw,(max-width: 1200px) 60vw,(max-width: 1600px) 50vw,  40vw"
                            data-srcset="{{ $article->cover->getSrcset() }}"
                        >
                            {{ $article->cover?->img()?->attributes(["class" => " absolute inset-0 w-full h-full object-cover object-top", "alt" => $article->title]) }}
                            <div class="glightbox-desc desc_article">
                                <div
                                    class="h-fit group-odd:md:-ml-28 group-even:md:-mr-28 group-even:md:order-1 z-10"
                                >
                                    <h1
                                        class="font-extrabold text-xl text-red-600 mb-2"
                                    >
                                        {{ $article->title }}
                                    </h1>
                                    <p class="py-2 text-base">
                                        {!! $article->content !!}
                                    </p>
                                </div>
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/90 to-black/10"
                            ></div>
                            <div class="relative p-6 w-full">
                                <div
                                    class="group flex flex-row justify-start rounded-t w-full"
                                    data-aos="fade-up"
                                >
                                    <div
                                        class="grid content-center mx-3 w-full space-y-1"
                                    >
                                        <div
                                            class="inline-flex flex-col align-middle space-y-2"
                                        >
                                            <span
                                                class="inline-flex flex-row align-middle"
                                            >
                                                <span
                                                    class="inline-block align-middle mr-2"
                                                >
                                                    <svg
                                                        class="w-4 h-4 fill-red-500"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"
                                                        ></path>
                                                    </svg>
                                                </span>
                                                <span
                                                    class="inline-flex flex-row align-middle text-sm"
                                                >
                                                    {{ $article->location }}
                                                </span>
                                            </span>
                                        </div>
                                        <div
                                            class="flex justify-between w-full"
                                        >
                                            <h2
                                                class="text-base font-semibold capitalize tracking-wide"
                                            >
                                                {{ $article->title }}
                                            </h2>
                                        </div>
                                        <div
                                            class="flex justify-between w-fit bg-red-600 p-1 px-2 capitalize text-xs text-white font-semibold"
                                        >
                                            <strong>
                                                {{ $article->posted_at->format("d F, Y") }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div
                            class="text-base p-6 text-justify bg-white/60 tracking-normal space-y-4"
                        >
                            {!! $article->content ?? "" !!}
                        </div>
                    </div>

                    @if (! is_null($article?->sections))
                        <ul>
                            @foreach ($article?->sections as $section)
                                <li
                                    class="grid md:grid-cols-2 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:px-16 items-center group"
                                >
                                    <a class="group-even:md:order-2">
                                        {{
                                            $section->cover?->img()?->attributes([
                                                "class" => "cursor-pointer gallery h-full object-cover object-top rounded hover:scale-105  transition-transform duration-500 ease-in-out",
                                                "alt" => $section->title,
                                                "data-glightbox" => "description: .desc_$loop->index ;descPosition: left ",
                                                "data-sizes" => "(max-width: 480px) 100vw, (max-width: 768px) 80vw, (max-width: 1024px) 70vw,(max-width: 1200px) 60vw,(max-width: 1600px) 50vw,  40vw",
                                                "data-srcset" => $section->cover->getSrcset(),
                                            ])
                                        }}

                                        <div
                                            class="glightbox-desc desc_{{ $loop->index }}"
                                        >
                                            <div
                                                class="h-fit group-odd:md:-ml-28 group-even:md:-mr-28 group-even:md:order-1 z-10"
                                            >
                                                <h1
                                                    class="font-extrabold text-xl text-red-600 mb-2"
                                                >
                                                    {{ $section->title }}
                                                </h1>
                                                <p class="py-2 text-base">
                                                    {!! $section->content !!}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <div
                                        class="bg-white p-8 h-fit group-odd:md:-ml-28 group-even:md:-mr-28 group-even:md:order-1 z-10"
                                    >
                                        <h1
                                            class="font-extrabold text-xl text-red-600 mb-2"
                                        >
                                            {{ $section->title }}
                                        </h1>
                                        <p class="py-2">
                                            {!! $section->content !!}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
