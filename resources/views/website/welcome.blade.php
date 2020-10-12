@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    @include('website.slider.slider')
    <!-- Home Start -->
    {{-- <section class="bg-half-170 d-table w-100 bg-primary"
        style="background: url('{{ asset('public/images/bg/bg2.png') }}') center center;" id="home">
        <div class="bg-overlay gradient-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="title-heading text-center">
                        <img src={{ asset('public/images/logo-white-big.png') }} class="img-fluid" style="width: 500px;"
                            alt="">
                        <h4 class="heading text-white mt-5 mb-3">Welcome to iDove</h4>
                        <p class="text-white-50 para-desc mx-auto mb-0">

                        </p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section--> --}}
    <!-- Home End -->
    {{-- @include('website.home.welcoming_words') --}}
    @include('website.home.about')
    @include('website.home.partners')
    @include('website.home.map')
@endsection
