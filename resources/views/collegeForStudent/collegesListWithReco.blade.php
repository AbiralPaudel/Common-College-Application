@extends('layouts.app')

@section('content')

<?php 
    $temp = 0;
    $profile = App\Profile::find(Auth::user()->id);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Colleges Recommended for You</div>
                    <div class="card-body ">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rColleges as $college)
                                <?php  $temp=0; ?>

                                <tr>
                                    <td><a href="/college/{{$college->id}}/info">{{$college->name}}</a></td>
                                    <td>
                                        <a href="/college/{{$college->id}}/info"><button class="btn btn-dark">Info</button></a>
                                            @foreach($profile->colleges as $myCollege)
                                                @if($college->name == $myCollege->name)
                                                    <button class="btn">Added
                                                        <!-- Added -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                        </svg>
                                                    </button>  
                                                    <?php $temp = 1; ?>
                                                    @break
                                                @endif      
                                            @endforeach

                                        @if($temp != 1)
                                            <button class="btn btn-dark" onclick="handleAdd({{$college->id}}, {{Auth::user()->id}})">Add
                                                <!-- add to my college -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                </svg>
                                            </button> 
                                        @endif

                                            
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">All Available Colleges</div>
                    <div class="card-body">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($colleges as $college)
                                <?php  $temp=0; ?>

                                <tr>
                                    <td><a href="/college/{{$college->id}}/info">{{$college->name}}</a></td>
                                    <td>
                                        <a href="/college/{{$college->id}}/info"><button class="btn btn-dark">Info</button></a>
                                            @foreach($profile->colleges as $myCollege)
                                                @if($college->name == $myCollege->name)
                                                    <button class="btn">Added
                                                        <!-- Added -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                        </svg>
                                                    </button>  
                                                    <?php $temp = 1; ?>
                                                    @break
                                                @endif      
                                            @endforeach

                                        @if($temp != 1)
                                            <button class="btn btn-dark" onclick="handleAdd({{$college->id}}, {{Auth::user()->id}})">Add
                                                <!-- add to my college -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                </svg>
                                            </button> 
                                        @endif

                                            
                                    </td>
                                </tr>
                            @endforeach
                                        <!-- <form  action="/college/{{$college->id}}/add/{{Auth::user()->id}}" method="post">
                                        @csrf
                                            <button type="submit" class="btn btn-success ml-4">Add to my College</button>
                                        </form> -->
                            </tbody>
                        </table>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="" method="POST" id="addCollegeForm">
                                @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Add College</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <p class="text-center strong">Are you sure you want to add this college?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                            <button type="submit" class="btn btn-success">Yes, Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleAdd(college_id, user_id)
        {
            var form = document.getElementById('addCollegeForm')
            form.action='/college/' + college_id + '/add/' + user_id
            $('#deleteModal').modal('show')

        }
    
    </script>
@endsection