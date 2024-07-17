@extends('Website.Layouts.website')
@section('seo')
    {!! seo($seoData) !!}
@endsection
@section('title','Sobre-nos')
@section('content')
    @include("Website.partials.hero")
    About
@endsection
