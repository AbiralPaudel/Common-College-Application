@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Applicants Information
                </div>
            </div><br>
            @foreach($colleges as $college)
            <div class="card">
                <div class="card-header">
                    {{$college->name}}
                </div>

                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <th>Applicant User ID</th>
                            <th>Applicant Name</th>
                            <th>Applicant Email</th>
                            <th>Applicant ID</th>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                                @foreach($profile->applications as $applicant)
                                        @if($college->id == $applicant->pivot->application_id)
                                            <tr>
                                                <td>{{$profile->id}}</td>
                                                <td>{{$profile->user->name}}</td>
                                                <td>{{$profile->user->email}}</td>
                                                <td>{{$applicant->pivot->unique_id}}</td>
                                            </tr>
                                        @endif

                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><br>
            @endforeach
        </div>
    </div>
</div>
@endsection