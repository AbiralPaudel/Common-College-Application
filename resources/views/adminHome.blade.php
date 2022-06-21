@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('college.create') }}">Add new College</a><br><br>
                    <a href="{{ route('college.index') }}">View added Colleges</a><br><br>
                    <a href="/users">View registered Users</a><br><br>
                    <a href="/applied/users">View Applicants Info</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection