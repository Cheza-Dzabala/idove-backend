@extends('layouts.app')

@section('title')
    Forums
@endsection

@section('content')

    <div class="mt-5 mb-5">
        <div class="bg-au-gold px-5 py-2 rounded">
            <h1 class=" text-xl mb-0 ">{{ $project->name }}</h1>
            <div class="flex justify-start space-x-4">
                <p class="text-xs text-white">
                    By {{ $project->user->full_name }}
                </p>
                <p class="text-xs text-white">
                    Started On: {{ $project->project_start_date }}
                </p>
                <p class="text-xs text-white">
                    Category: {{ $project->category->name }}
                </p>
                <p class="text-xs text-white">
                    Country: {{ $project->country_source->name }}
                </p>
            </div>
        </div>
        <div class="mt-5">
            <p class="text-muted">{!! $project->description !!}</p>
        </div>
        <div class="mt-5 flex flex-wrap">
            @foreach ($project->tags as $tag)
                <p class="rounded-r-sm bg-au-gold mr-10 p-2 text-xs">{{ $tag }}</p>
            @endforeach
        </div>
    </div>

    <!-- Home End -->

@endsection
