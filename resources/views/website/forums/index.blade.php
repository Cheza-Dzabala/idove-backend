@extends('layouts.app')

@section('title')
    Forums
@endsection

@section('content')
    <div class="mt-5">
        <div class="flex flex-row ">
            <div class="w-3/4">
                <div class="border-b-2 mb-4">
                    <h1 class="border-b-2 border-au-red w-16 text-xl mb-0 text-au-red">About</h1>
                </div>
                <div class=" flex flex-row flex-wrap">
                    @foreach ($posts as $post)
                        <div class="bg-au-light-brown w-60 h-64 p-4 mr-4 mb-4  flex flex-col justify-evenly rounded">
                            <a class="text-lg font-bold w-full">{{ $post->title }}</a>
                            <div class="text-sm"><a href="idovers/{{ $post->author->profile->slug }}">Author:
                                    {{ $post->author->full_name }}</a></div>
                            <div class="">
                                @if ($post->author->profile->country_name)
                                    Nationality: {{ $post->author->profile->country_name->name }}
                                @endif
                            </div>
                            <div class="font-extralight mt-2 text-sm">{{ $post->published_on }}</div>
                            <div class="justify-self-end">
                                <a href="posts/{{ $post->topic->forum->slug }}/{{ $post->topic->id }}/{{ $post->slug }}"
                                    class="p-4 text-au-red text-xs font-bold">Read Post</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-1/4">
                <div class="bg-au-gold px-1 py-2 rounded">
                    <h1 class=" text-sm mb-2 text-black">More Forums</h1>
                </div>
                <ul>
                    @foreach ($forums as $forum)
                        <li class="text-xs border-b-2 border-au-gray py-2 hover:text-au-red"><a
                                href="jvascript:void(0)">{{ $forum->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
