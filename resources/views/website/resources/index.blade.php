@extends('layouts.app')

@section('title')
    Resources
@endsection

@section('content')
    <!-- Home Start -->
    <section class="bg-half-170 d-table w-100 bg-primary" style="background: url({{ asset('public/images/bg/projects.png') }}) top center;" id="home">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-left">
                        <h3  style="color: white">Resources</h3>
                        <p class="text-white para-desc mt-3 mb-0">
                            Feel free to browse through all website resources made available to you.
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
            <div class="row">
                <div class="widget container-fluid">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist" style="height: 55px; display: flex; align-items: center; justify-content: space-around; background: #1A5632">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-docs-tab" data-toggle="pill" href="#pills-docs" role="tab" aria-controls="pills-docs" aria-selected="true" style="color: white; font-weight: bold">DOCUMENTS</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-docs" role="tabpanel" aria-labelledby="pills-docs-tab">
                            @include('website.resources.docs')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
