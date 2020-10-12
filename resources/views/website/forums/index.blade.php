@extends('layouts.app')

@section('title')
    Forums
@endsection

@section('content')
    <div style="display: flex; padding: 0 12rem;" class="container">

        <!-- Blog Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="sidebar component-wrapper mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="widget mb-4 pb-2 content">
                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="p-4 mt-4 rounded">
                                @foreach ($posts as $post)
                                    <div class="clearfix post-recent">
                                        <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img
                                                    alt="img" src="{{ asset('public/images/blog/07.jpg') }}"
                                                    class="img-fluid rounded" height="150px" width="150px"></a></div>
                                        <div class="post-recent-content float-left"><a
                                                href="posts/{{ $post->topic->forum->slug }}/{{ $post->topic->id }}/{{ $post->slug }}">{{ $post->title }}</a><span
                                                class="text-muted mt-2">{{ $post->published_on }}</span></div>
                                        <div class="post-recent-content float-left"><a
                                                href="idovers/{{ $post->author->profile->slug }}">Author:
                                                {{ $post->author->full_name }}</a></div>
                                        <div class="post-recent-content float-left">
                                            @if ($post->author->profile->country_name)
                                                Nationality: {{ $post->author->profile->country_name->name }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- RECENT POST -->
                    </div>
                    <!--end col-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <aside class="grid-4 region region-sidebar-first equal-height-element" id="region-sidebar-first"
            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px; height: 1812px;">
            <div class="theiaStickySidebar"
                style="padding-top: 0px; padding-bottom: 0px; position: static; transform: none;">
                <div class="region-inner region-sidebar-first-inner">
                    <section class="block block-menu block-menu-menu-departments block-menu-menu-menu-departments odd"
                        id="block-menu-menu-menu-departments">
                        <div class="block-inner clearfix">
                            <h2 class="block-title"><span>Forums</span></h2>

                            <div class="content clearfix">
                                <ul class="menu">
                                    @foreach ($forums as $forum)
                                        <li class="leaf"><a href="jvascript:void(0)">{{ $forum->title }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </aside>
    </div>

    <!--end section-->
    <!-- Blog End -->
    <!-- Home End -->

@endsection
