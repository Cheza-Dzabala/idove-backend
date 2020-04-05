@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Users</div>
                    <div class="card-body">
                        <div class="level">
                            <form action="post" class="form-inline">
                                <input type="text" class="form-control" placeholder="Search users" name="filter" class="filter-box"/>
                                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                            </form>
                            <div class="card-action">
                                Show All
                            </div>
                            <div class="card-action">
                                Show Staff
                            </div>
                            <div class="card-action">
                                Show iDovers
                            </div>
                            <div class="card-action">
                                <a href="{{ route('users.create') }}">Create User</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email</td>
                                    <td>Staff Member</td>
                                    <td>Is Active</td>
                                    <td>Account Creation</td>
                                    <td>Last Login</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <a href="#">{{ $user->first_name }}</a>
                                        </td>
                                        <td>
                                            {{ $user->last_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        <td>
                                            {{ $user->is_staff ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            {{ $user->is_active ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            {{ $user->created_at ? $user->created_at->diffForHumans() : '' }}
                                        </td>

                                        <td>
                                            {{ $user->last_login }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
