@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Authentication</div>
                <div class="card-body">
                   <a href="{{ route('users.all') }}">User Accounts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
