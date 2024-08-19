@extends('Website.Layouts.website')
@section('seo')
    {!! seo($seoData) !!}
@endsection
@section('title','Relatórios')
@section('content')
    @include("Website.partials.hero_reports")
    <section class="">
        <div
            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-start  text-gray-800"
        >
            <div data-aos="fade-up" class="grid sm:grid-cols-2 gap-4 w-full sm:gap-2 flex-row mb-0.5 bg-white rounded hover:cursor-pointer hover:bg-white/95 aos-init aos-animate">
                <div class="flex-col content-center space-y-2 p-6 sm:px-2">
                    <img class="inset-0 max-w-32 p-4 object-cover" src="{{Vite::asset('resources/website/images/reports.svg')}}" />
                    <h2 class="mb-2 text-wrap text-xl font-bold tracking-tight text-red-600 first-letter:uppercase line-clamp-4">
                        Resumo de casos de feminicídio por idades e género
                    </h2>
                </div>

                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400 border border-red-500">
                        <thead class="text-xs text-gray-50 uppercase bg-red-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Grupos</th>
                                @foreach(\App\Enums\Gender::getValues() as $value)
                                <th scope="col" class="px-6 py-3">{{$value}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($report_by_age as $key => $range)
                                 <tr class="bg-white font-bold dark:bg-gray-800">
                                     <td class="px-6  border-red-700 border  py-2">{{$key }}</td>
                                    @foreach(\App\Enums\Gender::getValues() as $value)
                                         <td class="px-6 py-2  border-red-700 border">{{$range[$value]}}</td>
                                    @endforeach
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
