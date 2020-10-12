@extends('layouts.app')

@section('title')
    Forums
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="widget mb-4 pb-2">
                    <h4 class="widget-title">Projects</h4>
                    @foreach ($projects as $project)
                        <div class="p-4 mt-4 rounded shadow">
                            <div class="clearfix post-recent">
                                <h5>Project Name:</h5>
                                <div class="post-recent-content float-left">{{ $project->name }}</div>
                                <br />
                                <br />
                                <h6>Project Owner:</h6>
                                <div class="post-recent-content float-left"> <a
                                        href="idovers/{{ $project->user->profile->slug }}">{{ $project->user->full_name }}</a>
                                </div>
                                <br />
                                <br />

                                <h6>Country:</h6>
                                <div class="post-recent-content float-left">{{ $project->country_source->name }}</div>
                                <br />
                                <br />

                                <h6>Start Date:</h6>
                                <div class="post-recent-content float-left">{{ $project->start_date }}</div>
                                <br />
                                <br />
                                <h6>Summary:</h6>
                                <p>{!! $project->short_summary !!}</p>
                                <br />
                                <br />
                                <small><a href="/projects/{{ $project->id }}">
                                        <h5 class="mb-0">Read More >> </h5>
                                    </a></small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-20">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </section>

    <!-- Home End -->

@endsection
