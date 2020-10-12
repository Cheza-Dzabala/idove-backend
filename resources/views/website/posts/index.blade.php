@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <!-- Blog Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="card blog-post border-0 rounded overflow-hidden">
                        <div class="card-body p-4 content">
                            <div class="bg-au-gold px-1 py-2 mb-5 rounded">
                                <p class="text-md text-white">{{ $post->title }}</p>
                                <p class="text-xs text-white">by {{ $post->author->full_name }}</p>
                            </div>

                            <p class="text-sm">{!! $post->post !!}</p>
                            <ul
                                class="list-unstyled post-meta d-flex justify-content-between align-items-center mb-0 pt-3 border-top">
                                <li>
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="like text-dark"><i
                                                    data-feather="heart" class="fea icon-sm"></i>{{ $post->likes }}</a></li>
                                        <li class="list-inline-item ml-2"><a href="javascript:void(0)"
                                                class="comment text-dark"><i data-feather="message-circle"
                                                    class="fea icon-sm"></i>{{ $post->comments->count() }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="list-unstyled social-icon mb-0">
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </ul>
                                    <!--end icon-->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end blog post-->

                    <!-- Comments Start -->
                    <div class="row">
                        <div class="col-12 mt-4 pt-2">
                            <div class="section-title">
                                <h5 class="mb-0">Comments :</h5>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-12 mt-4 pt-2">
                            <div class="p-4  rounded" style="border: 1px solid #000">
                                <ul class="media-list list-unstyled mb-0">
                                    @foreach ($post->comments as $comment)
                                        <li class="comment-desk">
                                            <div class="d-flex align-items-center">
                                                <a class="float-left pr-3" style="padding-right: 20px" href="#">
                                                    <img src={{ asset($comment->author->profile->avatar) }}
                                                        class="avatar avatar-md-sm" height="50px" width="50px" alt="">
                                                </a>
                                                <div class="overflow-hidden d-block">
                                                    <h6 class="media-heading mb-0"><a href="javascript:void(0)"
                                                            class="text-dark">{{ $comment->author->full_name }}</a></h6>
                                                    <small class="text-muted">20th October, 2019 at 01:25 pm</small>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-muted font-italic p-3 bg-light rounded">
                                                    {{ $comment->comment }}
                                                </p>
                                            </div>
                                        </li>

                                    @endforeach

                                </ul>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->

        <div class="container mt-100" style="margin-top: 50px">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="text-sm mb-4">More By This iDover</h4>
                        <p class="text-sm mx-auto para-desc mb-0">Some more great content written by this iDover.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                @foreach ($all_posts as $all)
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card blog-post border-0  rounded overflow-hidden">
                            <div class="card-body p-4 content">
                                <h5><a href="/posts/{{ $all->topic->forum->slug }}/{{ $all->topic->id }}/{{ $all->slug }}"
                                        class="title text-dark">{{ $all->title }}</a></h5>
                                <p class="text-muted mb-3">This is required when, for example, the final text is not yet
                                    available.</p>
                                <ul class="list-unstyled post-meta d-flex justify-content-between mb-0 pt-3 border-top">
                                    <li>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item"><a href="javascript:void(0)"
                                                    class="like text-dark"><i data-feather="heart"
                                                        class="fea icon-sm"></i></a></li>
                                            <li class="list-inline-item ml-2"><a href="javascript:void(0)"
                                                    class="comment text-dark"><i data-feather="message-circle"
                                                        class="fea icon-sm"></i>{{ $all->comments->count() }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/posts/{{ $all->topic->forum->slug }}/{{ $all->topic->id }}/{{ $all->slug }}"
                                            class="read-more text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                @endforeach


            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End -->
@endsection
