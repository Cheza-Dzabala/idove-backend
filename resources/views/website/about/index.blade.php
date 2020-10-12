@extends('layouts.app')

@section('title')
    Resources
@endsection

@section('content')

    <section class="section mt-10">
        <div class="container">
            <div class="row content">
                @include('website.about.about')
                @include('website.about.context')
            </div>
        </div>
    </section>
@endsection
