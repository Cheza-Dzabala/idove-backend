@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    {{-- @include('website.home.welcoming_words') --}}
    <div class=" my-8">
        @include('website.slider.slider')
    </div>

    @include('website.home.about')
    @include('website.home.partners')
    @include('website.home.map')
@endsection
