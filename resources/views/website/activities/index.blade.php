@extends('layouts.app')

@section('title')
    Activities
@endsection

@section('content')

    <section class="page-section">
        <div class="section-content">
            <div class="section-title">
                <h1>Our Activities</h1>
                <div class="section-links">
                    <a onclick="openTab('gallery')">Images</a>
                    <a onclick="openTab('videos')">Videos</a>
                </div>
            </div>

            <div class="section-details carousel">
                <div class="tab-pane fade show active carousel" id="gallery" role="tabpanel"
                    aria-labelledby="pills-gallery-tab">
                    @include('website.activities.gallery')
                </div>
                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="pills-videos-tab">
                    @include('website.activities.videos')
                </div>
            </div>
        </div>
    </section>

@section('js')
    <script>
        document.getElementById("videos").style.display = "none";

        function openTab(tabName) {
            var i;
            var x = document.getElementsByClassName("tab-pane");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }

    </script>
@endsection
{{--
<!-- Home Start -->
<section class="bg-half-170 d-table w-100 bg-primary"
    style="background: url({{ asset('public/images/bg/projects.png') }}) top center;" id="home">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="title-heading text-center text-md-left">
                    <h3 style="color: white">Activities</h3>
                    <p class="text-white para-desc mt-3 mb-0">
                        Find out what iDove has been up to recently in our activities catalogue.
                    </p>
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

<section class="section">
    <div class="container">
        <div class="row">
            <div class="widget container-fluid">
                <ul class="nav nav-pills" id="pills-tab" role="tablist"
                    style="height: 55px; display: flex; align-items: center; justify-content: space-around; background: #1A5632">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-gallery-tab" data-toggle="pill" href="#pills-gallery"
                            role="tab" aria-controls="pills-gallery" aria-selected="true"
                            style="color: white; font-weight: bold">IMAGE GALLERY</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-videos-tab" data-toggle="pill" href="#pills-videos" role="tab"
                            aria-controls="pills-videos" aria-selected="false"
                            style="color: white; font-weight: bold">VIDEO GALLERY</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-gallery" role="tabpanel"
                        aria-labelledby="pills-gallery-tab">
                        @include('website.activities.gallery')
                    </div>
                    <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">
                        @include('website.activities.videos')
                    </div>
                </div>

            </div>
        </div>
    </div>
</section> --}}
@endsection
