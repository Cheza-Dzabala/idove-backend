@extends('layouts.app')

@section('title')
    iDovers
@endsection

@section('content')
    <div class="mt-5 mb-10">
        <div class="flex flex-wrap">
            @foreach ($users as $user)
                <div class="flex flex-column mr-2 mb-2">
                    <div class="bg-local h-60 w-60 flex flex-column flex-col-reverse"
                        style="background-image: url({{ asset($user->profile->avatar) }})">
                        <div class="h-16 bg-au-light-brown p-4">
                            <a href="idovers/{{ $user->profile->slug }}">
                                <h4 class="text-xs text-">{{ $user->full_name }}</h4>
                            </a>
                            @if ($user->profile->country_name)
                                <p class="text-xs ">{{ $user->profile->country_name->name }}</p>
                            @else
                                <p class="text-sm ">Unlisted</p>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--end row-->
        <div class="mt-5">
            {{ $users->links() }}
        </div>
    </div>
    <!--end container-->
@endsection
