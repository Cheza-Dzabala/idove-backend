@extends('layouts.app')

@section('title')
    Forums
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="card-body p-4 content">

                            <h1>{{ $project->name }}</h1>

                            <p class="text-muted">{!! $project->description !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="sidebar component-wrapper mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="widget mb-4 pb-2">
                                <div class="tagcloud p-4 mt-4 rounded ">
                                    @foreach ($project->tags as $tag)
                                        <a href="jvascript:void(0)" class="rounded">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="widget p-4 mt-4 rounded">
                        <small>
                            <h6>Project Owner:</h6> <a
                                href="idovers/{{ $project->user->profile->slug }}">{{ $project->user->full_name }}</a>
                        </small>
                        <br />
                        <br />
                        <small>
                            <h6>Project Start Date:</h6> {{ $project->project_start_date }}
                        </small>
                        <br />
                        <br />
                        <small>
                            <h6>Category:</h6> {{ $project->category->name }}
                        </small>
                        <br />
                        <br />
                        <small>
                            <h6>Location:</h6> {{ $project->country_source->name }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Home End -->

@endsection
