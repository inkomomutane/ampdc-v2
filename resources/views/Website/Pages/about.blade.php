@extends('Website.Layouts.website')
@section('seo')
    {!! seo($seoData) !!}
@endsection
@section('title','Sobre-nos')
@section('content')
    @include("Website.partials.hero_about")
<section class="bg-gradient-to-b from-white via-red-200 to-white  dark:bg-gray-900">
    <div
        class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:px-16 justify-items-start bg-white text-gray-800"
    >
        <section class="mb-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Quem Somos</h2>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">Somos um movimento feminista composto por diversas organizações da sociedade civil. O Observatório do Feminicídio de Moçambique foi criado através do Fórum Regional Centro do Gênero (FRCG), nascido do grupo multissetorial da província de Sofala, no quarto trimestre de 2023. Nosso principal objetivo é monitorar, refletir e responder ao feminicídio em Moçambique, promovendo uma interface crucial com instituições públicas e privadas e outros parceiros colaborativos.</p>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Nossa História</h2>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">O Observatório do Feminicídio surgiu como uma resposta contundente aos movimentos feministas em Moçambique que se levantaram contra a violência de gênero. Reconhecendo a violência contra mulheres como um problema social crítico, tornou-se imperativo desenvolver políticas públicas robustas e envolver diversos setores da sociedade para enfrentar este desafio. Desde a sua criação, o Observatório tem sido um pilar na luta contra o feminicídio, promovendo ações concretas e colaborativas para erradicar este mal.</p>
        </section>

        <section class="mb-8   hyphens-auto text-wrap leading-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Nossos Objetivos</h2>
            <h3 class="text-xl font-semibold mb-2">Objetivo Geral</h3>
            <p class="mb-4">Criar um espaço interdisciplinar para reflexão e proposição de estratégias eficazes para enfrentar o crime de feminicídio em Moçambique.</p>
            <h3 class="text-xl font-semibold mb-2">Objetivos Específicos</h3>
            <ul class="list-disc pl-6 mb-4 marker:text-red-600 marker:p-4 marker:h-3">
                <li>Diálogo e Articulação: Promover a interface entre academias, sociedade civil e instituições públicas, focando no estudo e combate ao feminicídio.</li>
                <li>Colaboração Estratégica: Trabalhar junto a diversas instituições públicas e parceiros estratégicos para compartilhar informações, trocar experiências e contribuir na formulação de políticas públicas de enfrentamento ao feminicídio.</li>
                <li>Pesquisa Acadêmica: Envolver academias em ações de pesquisa para entender profundamente as causas e motivações do feminicídio, desenvolvendo estratégias eficazes de combate.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Missão</h2>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">Nossa missão é advogar pelos direitos humanos das mulheres, trabalhando com instituições competentes a nível nacional para prevenir o feminicídio, garantir segurança e proteção, e obter respostas eficazes para os casos ocorridos.</p>
        </section>

        <section class="mb-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Visão</h2>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">A nossa visão é construir uma sociedade moçambicana livre de feminicídio, onde leis justas e transparentes assegurem a proteção e os direitos das mulheres.</p>
        </section>

        <section class="mb-8 hyphens-auto text-wrap leading-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Nossas Ações</h2>
            <h3 class="text-xl font-semibold mb-2">— Monitoramento e Relatórios</h3>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">Monitoramos continuamente os casos de feminicídio e produzimos relatórios detalhados que fornecem insights valiosos sobre a situação no país. Esses relatórios são usados para informar políticas públicas e estratégias de intervenção.</p>
            <h3 class="text-xl font-semibold mb-2">— Campanhas de Sensibilização</h3>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">Realizamos campanhas de sensibilização em todo o país para educar a população sobre a gravidade do feminicídio e mobilizar a sociedade para a ação coletiva contra a violência de gênero.</p>
            <h3 class="text-xl font-semibold mb-2">— Programas de Apoio</h3>
            <p class="mb-4 indent-8 hyphens-auto text-wrap leading-8">Oferecemos apoio psicológico, jurídico e social às vítimas de violência de gênero e suas famílias, ajudando-as a reconstruir suas vidas após experiências traumáticas.</p>
        </section>

        <section class="mb-8  hyphens-auto text-wrap leading-8">
            <h2 class="text-3xl font-black mb-4 text-red-600">Nossas Parcerias</h2>
            <p class="mb-4">— Trabalhamos em estreita colaboração com uma rede diversificada de parceiros, incluindo:</p>
            <ul class="list-disc pl-6 marker:text-red-600 marker:p-4 marker:h-3">
                <li>Organizações da Sociedade Civil: Que fornecem apoio local e advocacy.</li>
                <li>Instituições Acadêmicas: Que conduzem pesquisas e estudos sobre feminicídio.</li>
                <li>Entidades Governamentais: Que ajudam a formular e implementar políticas públicas.</li>
            </ul>
        </section>
    </div>
</section>
    @include('Website.partials.partners')
@endsection
