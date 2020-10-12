@extends('layouts.app')

@section('title')
    iDove Organizers
@endsection

@section('content')
    <!-- Home Start -->
    <section class="bg-half-170 d-table w-100 bg-primary" style="background: url({{ asset('public/images/bg/projects.png') }}) top center;" id="home">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-left">
                        <h3  style="color: white">Organizers</h3>
                        <p class="text-white para-desc mt-3 mb-0">
                            Meet the team that makes iDove happen year in year out.
                        </p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 1000 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-4">Team Members</h4>
                            <p class="text-muted mx-auto para-desc mb-0">
                                Meet the team, collaborate and reach out for more information.
                            </p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                   @foreach($organizers as $organizer)
                        <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                            <div class="card border-0 team overflow-hidden">
                                <img src="{{ asset('storage/'.$organizer->avatar)}}" class="img-fluid rounded-pill" alt="">
                                <div class="card-body content pt-4 text-center">
                                    <h5 class="mb-0">{{$organizer->full_name}}</h5>
                                    @if($organizer->twitter)
                                    <a href="{{ $organizer->twitter }}" target="_blank">
                                        <i data-feather="twitter" class="fea icon-md fea-social"></i>
                                    </a>
                                    @endif
                                    @if($organizer->email)
                                    <a href="mailto:{{ $organizer->email }}">
                                        <i data-feather="mail" class="fea icon-md fea-social"></i>
                                    </a>
                                    @endif
                                    @if($organizer->linked_in)
                                        <a href="{{ $organizer->linked_in }}" target="_blank">
                                            <i data-feather="linkedin" class="fea icon-md fea-social"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div>
            </div>
                </div>
    </section>

@endsection
