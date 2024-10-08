@extends("Website.Layouts.website")
@section("seo")
    {!! seo($seoData) !!}
@endsection

@push("scripts")
    @vite("resources/website/js/reports.ts")
@endpush

@section("title", "Relatórios")
@section("content")
    @include("Website.partials.hero_reports")
    <section class="bg-gradient-to-b from-white to-red-200">
        <div
            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-start text-gray-800"
        >
            <div
                data-aos="fade-up"
                class="grid  gap-4 w-full sm:gap-2 flex-row mb-0.5 rounded hover:cursor-pointer aos-init aos-animate"
            >
                <div class="flex-col content-center space-y-2 p-6 sm:px-2">
                    <img
                        class="inset-0 max-w-32 p-4 object-cover"
                        src="{{ Vite::asset("resources/website/images/reports.svg") }}"
                    />
                    <h2
                        class="mb-2 text-wrap text-xl font-bold tracking-tight text-red-600 first-letter:uppercase line-clamp-4"
                    >
                        Resumo de casos de feminicídio por idades e género
                    </h2>
                </div>

                <div>
                    <table
                        class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400 border border-red-500"
                    >
                        <thead
                            class="text-xs text-gray-50 uppercase bg-red-600 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">Grupos</th>
                                @foreach (\App\Enums\Gender::getValues() as $value)
                                    <th scope="col" class="px-6 py-3">
                                        {{ $value }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report_by_age as $key => $range)
                                <tr class="bg-white font-bold dark:bg-gray-800">
                                    <td class="px-6 border-red-700 border py-2">
                                        {{ $key }}
                                    </td>
                                    @foreach (\App\Enums\Gender::getValues() as $value)
                                        <td
                                            class="px-6 py-2 border-red-700 border"
                                        >
                                            {{ $range[$value] }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
     <section class="bg-gradient-to-b from-red-200 via-white to-red-200">
         <div
             class="grid sm:grid-cols-2 md:grid-cols-3 max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-center "
         >

             <div class="p-6">
                 <div id="violence_location" class="h-56 md:h-72">
                 </div>
                   <div>
                       <h6 class="text-center text-xl font-bold text-red-600 mt-6">Locais das ocorrências</h6>
                   </div>
             </div>

             <div class="p-6">
                  <div id="period-of-act" class="h-56 md:h-72">
            </div>
            <h6 class="text-center text-xl font-bold text-red-600 mt-6">Período das ocorrências</h6>
        </div>

             <div class="p-6">
                   <div id="violence_reason" class="h-56 md:h-72">
                   </div>
                    <div>
                        <h6 class="text-center text-xl font-bold text-red-600 mt-6">Motivos das ocorrências</h6>
                    </div>
             </div>
         </div>
     </section>
    @include("Website.partials.reports")
@endsection
