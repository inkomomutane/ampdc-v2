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
            <div data-aos="fade-up" class="inline-flex gap-4 w-full sm:gap-2 flex-row mb-0.5 bg-white rounded hover:cursor-pointer hover:bg-white/95 aos-init aos-animate">
                <div class=" sm:h-auto ">
                    <img class="inset-0 max-w-32 p-4 object-cover" src="{{Vite::asset('resources/website/images/reports.svg')}}" />

                </div>
                <div class="grid content-center space-y-2 p-6 sm:px-2">
                    <h2 class="mb-2 text-lg font-bold tracking-tight text-red-600 first-letter:uppercase line-clamp-4">
                        Sem documentos disponíveis ainda.
                    </h2>
                    <time class="w-fit text-xs text-white font-semibold tracking-tight bg-red-500 p-1 px-2 rounded-sm">
                        {{now()->format('d, M Y')}}
                    </time>
                </div>
            </div>
        </div>
    </section>
@endsection
