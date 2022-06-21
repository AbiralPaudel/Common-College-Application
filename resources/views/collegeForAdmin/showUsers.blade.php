@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Registered Users') }}</div>

                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @if($user->is_admin == 0 && $user->profile_id)
                                            <td><a href="/user/{{$user->id}}"><button class="btn btn-sm btn-dark">Info</button></a></td>
                                        @elseif($user->is_admin == 1)
                                            <td><button class="btn btn-sm btn-dark">Admin</button></td>
                                        @elseif($user->profile_id == NULL)
                                        <td><button class="btn btn-sm btn-danger">Profile not added</button></td>
                                        @else
                                        <td></td>
                                        @endif
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
