@extends('layouts.app')

@section('title')
    iDovers
@endsection

@section('content')
    <div class="container mt-100 mt-60">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 team overflow-hidden" style="display: flex;
                align-items: center;">
                        <img src="{{ asset($user->profile->avatar) }}" class="img-fluid" alt="" style="
                height: 200px;
                width: 200px;">
                        <div class="card-body content pt-4 text-center">
                            <a href="idovers/{{ $user->profile->slug }}" style="color:#9F2241;">
                                <h5 class="mb-0">{{ $user->full_name }}</h5>
                            </a>
                            @if ($user->profile->country_name)
                                <small class="text-muted">{{ $user->profile->country_name->name }}</small>
                            @else
                                <small class="text-muted">N / A</small>
                            @endif
                        </div>
                    </div>
                </div>
                <!--end col-->
            @endforeach
        </div>
        <!--end row-->
        <div class="row justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
    <!--end container-->
@endsection
