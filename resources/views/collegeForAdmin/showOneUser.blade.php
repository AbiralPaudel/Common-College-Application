@extends('layouts.adminApp')

@section('content')
<?php  
    $arrayOfInterests = explode(',', $user->profile->interest);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">User : {{$user->name}} : Info</div>

                <div class="card-body">
                    <div class="float-right mr-5">
                        <a target="_blank" href="/images/your_photos/{{$user->profile->your_photo}}">
                            <img src="/images/your_photos/{{$user->profile->your_photo}}" alt="{{$user->profile->your_photo}}"
                            style="border: 1px solid #ddd;
                                    border-radius: 4px;
                                    padding: 5px;
                                    width: 150px;">
                        </a>
                    </div>
                    <table class="table table-light">
                        <tbody>
                            <tr>
                                <td><strong>User ID</strong></td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td><strong>Gender</strong></td>
                                <td>{{ $user->profile->gender }}</td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td>{{ $user->profile->address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth (A.D.)</strong></td>
                                <td>{{ $user->profile->dob }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number</strong></td>
                                <td>{{ $user->profile->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>School Name</strong></td>
                                <td>{{ $user->profile->school_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Interests of College Speciality</strong></td>
                                <td>
                                    <ul class="navbar-nav ml-auto">
                                    @foreach($arrayOfInterests as $interest)
                                        @if($interest != "Academic")
                                            <li class="nav-item">{{$interest}}</li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Citizenship Front</strong></td>
                                <td><a target="_blank" href="/images/citizenship_fronts/{{$user->profile->citizenship_front}}">
                                        <img src="/images/citizenship_fronts/{{$user->profile->citizenship_front}}" alt="{{$user->profile->citizenship_front}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Citizenship Back</strong></td>
                                <td><a target="_blank" href="/images/citizenship_back/{{$user->profile->citizenship_back}}">
                                        <img src="/images/citizenship_backs/{{$user->profile->citizenship_back}}" alt="{{$user->profile->citizenship_back}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Marksheet Copy</strong></td>
                                <td><a target="_blank" href="/images/marksheet_photos/{{$user->profile->marksheet_photo}}">
                                        <img src="/images/marksheet_photos/{{$user->profile->marksheet_photo}}" alt="{{$user->profile->marksheet_photo}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
