@extends('layouts.app')

@section('content')
<?php 
    $profile = App\Profile::find(Auth::user()->id);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('dangerstatus'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('dangerstatus') }}
                        </div>
                    @endif

                    @if(Auth::user()->has_applied == 1)
                        <h6>Your Application Progress:</h6>
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        <th>College Name</th>
                                        <th>Action</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($profile->applications as $college)
                                    <tr>
                                        <td><a href="/college/{{$college->id}}/info">{{$college->name}}</a></td>
                                        <td><form action="/view/{{$college->id}}/admitCard/{{$college->pivot->profile_id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">View Admit Card</button>
                                        </form></td>
                                        <td><strong> Verified </strong></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            

                    @else
                        <h2>Welcome, {{ Auth::user()->name }}!</h2> <hr>
                        Congratulations on taking this first step in the college application process! <br>
                        Here are some tips to get you started: <br>
                        <ul>
                            <li>This tab is your Dashboard. After you add a college to your list, you will see your application progress here.</li>
                            <li>All colleges will need you to answer the common questions under your <a href="{{route('profile.edit', Auth::user()->id)}}">My Info</a> tab.</li>
                            <li>To see the available colleges, head over to the <a href="/available/colleges">Available Colleges</a> tab.</li>
                            <li>To search for a college, head over to the <a href="/search">College Search</a> tab.</li>
                            <li>Once you have added a college, you can complete and submit your application in the <a href="/college/my/{{Auth::user()->id}}">My Colleges</a> tab.</li>

                        </ul>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
