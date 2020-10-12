@extends('layouts.app')

@section('title')
    iDovers
@endsection

@section('content')
    <div class="flex flex-row">
        <div class="w-3/4 my-5 px-4">
            <div>
                <div class="border-b-2 mb-5">
                    <h1 class="border-b-2 border-red-800 w-20 text-lg mb-0 text-red-800">SUMMARY</h1>
                </div>
                <div class="float-left bg-local h-60 w-60 mr-2 mb-2  flex  flex-column flex-col-reverse mt-2"
                    style="background-image: url({{ $profile->avatar }})">
                    <div class="h-16 bg-black bg-opacity-20 p-4">
                        <h4 class="text-xs text-white ">{{ $profile->user->full_name }}</h4>
                    </div>
                </div>
                <p class="text-xs text-white">{!! $profile->summary !!}</p>
            </div>
            <div>
                <div class="border-b-2 mb-5">
                    <h1 class="border-b-2 border-red-800 w-24 text-lg mb-0 text-red-800">PVE WORK</h1>
                </div>
                <p>{!! $profile->pve_work !!}</p>
            </div>
        </div>
        <div class="w-1/4 my-5">
            <div class="border-b-2 mb-5">
                <h1 class="border-b-2 border-red-800 w-20 text-lg mb-0 text-red-800">SOCIALS</h1>
            </div>
            <div class=" rounded">
                <h6 class="text-xs mb-4">Share Profile</h6>
                <div class="sharethis-inline-share-buttons"></div>
            </div>
            <div class="bg-blue-100 rounded mt-10 p-5">
                <h4 class="text-xs">Follow {{ $profile->user->full_name }}</h4>
                <div class="pt-4 px-4 pb-3 mt-4 rounded">
                    @if ($profile->facebook)
                        <a href="{{ $profile->facebook }}" target="_blank" class="rounded"><i
                                class="mdi mdi-facebook icon-white"></i></a>

                    @endif
                    @if ($profile->linked_in)
                        <a href="{{ $profile->linked_in }}" target="_blank" class="rounded"><i
                                class="mdi mdi-linkedin"></i></a>

                    @endif
                    @if ($profile->twitter)
                        <a href="{{ $profile->twitter }}" target="_blank" class="rounded"><i
                                class="mdi mdi-twitter"></i></a>

                    @endif
                    @if ($profile->instagram)
                        <a href="{{ $profile->instagram }}" target="_blank" class="rounded"><i
                                class="mdi mdi-instagram"></i></a>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
{{--
<!-- Home Start -->
<section class="bg-half-170 d-table w-100 bg-primary" id="home">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="title-heading text-center text-md-left">
                    <h3 style="color: white">{{ $profile->user->full_name }}</h3>
                    <p class="para-desc mt-3 mb-0" style="color: white"></p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 1000 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Home End -->

<div class="container mt-100 mt-60">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12" style="display: flex;">
            <img src="{{ $profile->avatar }}" class="img-fluid rounded-pill" />
        </div>

        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12" style="justify-content: left">
            <p><span style="font-size: small; color: black; font-weight: bold;"> Full Name: </span>
                <small>{{ $profile->user->full_name }}</small>
            </p>
            <p><span style="font-size: small; color: black; font-weight: bold;"> Country: </span>
                <small>{{ $profile->country_of_residence }}</small>
            </p>
        </div>

    </div>
    <div class="row">
        <div class="widget mb-4 pb-2">
            <div class="p-4 mt-4 rounded ">
                <h6 class="widget-title">My PVE Work</h6>
                <p>{!! $profile->pve_work !!}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="widget mb-4 pb-2">
                <div class="p-4 mt-4 rounded ">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <h6 class="widget-title">About Me</h6>
                            <p>{!! $profile->summary !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Hobbies:</h6>
                            <p>{!! $profile->hobbies !!}</p>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite Music Bands / Artists:</h6>
                            <p>{!! $profile->favourite_music_bands !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite TV Shows:</h6>
                            <p>{!! $profile->favourite_tv_shows !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite Books:</h6>
                            <p>{!! $profile->favourite_books !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite Writers:</h6>
                            <p>{!! $profile->favourite_writers !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite Movies:</h6>
                            <p>{!! $profile->favourite_movies !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite Movies:</h6>
                            <p>{!! $profile->favourite_movies !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Favourite Games:</h6>
                            <p>{!! $profile->favourite_games !!}</p>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
                            <h6 class="widget-title">Other Interests:</h6>
                            <p>{!! $profile->other_interests !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="widget mb-4 pb-2">
                <div class="p-4 mt-4 rounded">
                    <h4 class="widget-title">Personal Info</h4>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Religious Beliefs: </span>
                        <small>{{ $profile->religion }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Date of Birth:</span>
                        <small>{{ $profile->date_of_birth }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Nationality: </span>
                        <small>
                            @if ($profile->country_name)
                                {{ $profile->country_name->name }}

                            @endif
                        </small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Lives in: </span>
                        <small>{{ $profile->country_of_residence }}, {{ $profile->city_of_residence }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Joined: </span>
                        <small>{{ $profile->date_joined }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Gender: </span>
                        <small>{{ $profile->gender }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Marital Status: </span>
                        <small>{{ $profile->marital_status }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Email: </span>
                        <small>{{ $profile->user->email }}</small>
                    </p>
                    <p><span style="font-size: small; color: black; font-weight: bold;"> Website: </span>
                        <small>{{ $profile->website }}</small>
                    </p>
                </div>
            </div>
            <div class="widget">
                <h4 class="widget-title">Follow {{ $profile->user->full_name }}</h4>
                <div class="pt-4 px-4 pb-3 mt-4 rounded">
                    <ul class="list-unstyled social-icon social mb-0">
                        @if ($profile->facebook)
                            <a href="{{ $profile->facebook }}" target="_blank" class="rounded"><i
                                    class="mdi mdi-facebook"></i></a>

                        @endif
                        @if ($profile->linked_in)
                            <a href="{{ $profile->linked_in }}" target="_blank" class="rounded"><i
                                    class="mdi mdi-linkedin"></i></a>

                        @endif
                        @if ($profile->twitter)
                            <a href="{{ $profile->twitter }}" target="_blank" class="rounded"><i
                                    class="mdi mdi-twitter"></i></a>

                        @endif
                        @if ($profile->instagram)
                            <a href="{{ $profile->instagram }}" target="_blank" class="rounded"><i
                                    class="mdi mdi-instagram"></i></a>

                        @endif

                    </ul>
                </div>
            </div>
            <div class="widget">
                <h4 class="widget-title">Share {{ $profile->user->full_name }}'s Profile</h4>
                <div class="pt-4 px-4 pb-3 mt-4 rounded">
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>

        </div>
    </div>
    <!--end row-->
</div>
<!--end container--> --}}
