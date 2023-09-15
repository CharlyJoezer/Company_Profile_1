@extends('templates.template')

@section('content')
    <div class="slider">
        @include('Components.Home.slide')
        @include('Components.Home.parts')
        @include('Components.Home.about')
        @include('Components.Home.service-support')
        @include('Components.Home.gallery')
        @include('Components.Home.contact')
@endsection