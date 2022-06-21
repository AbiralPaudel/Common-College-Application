@extends('layouts.app')

@section('content')
<?php 
    $temp = 0;
    $product_id = uniqid();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My Colleges') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                @if(Auth::user()->has_added == 1)
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>College Name</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profile->colleges as $college)
                            <?php  $temp=0; ?>
                                <tr>
                                    <td>
                                    <a href="/college/{{$college->id}}/info">{{$college->name}}</a>
                                    </td>
                                    <td>
                                        <a href="/college/{{$college->id}}/info"><button class="btn btn-dark">Info</button></a>
                                        <button class="btn btn-danger" onclick="handleDelete({{$college->id}}, {{Auth::user()->id}})">Delete</button> 
                                        
                                        <br>
                                        
                                    </td>
                                    <td>
                                        @foreach($profile->applications as $myCollege)
                                            @if($college->name == $myCollege->name)
                                                <button class="btn">Applied
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                                    <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                </svg>
                                                </button>  
                                                <?php $temp = 1; ?>
                                                @break
                                            @endif      
                                        @endforeach
                                        @if($temp != 1)
                                        <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                            <input value="100" name="tAmt" type="hidden">
                                            <input value="100" name="amt" type="hidden">
                                            <input value="0" name="txAmt" type="hidden">
                                            <input value="0" name="psc" type="hidden">
                                            <input value="0" name="pdc" type="hidden">
                                            <input value="EPAYTEST" name="scd" type="hidden">
                                            <input value="{{$college->id}}-{{$college->phone_number}}-{{$product_id}}" name="pid" type="hidden">
                                            <input value="http://localhost:8000/payment-verify?q=su" type="hidden" name="su">
                                            <input value="http://localhost:8000/payment-verify?q=fu" type="hidden" name="fu">
                                            <button class="btn btn-dark" type="submit">Apply
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                                    <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                                </svg>
                                            </button> 
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="modal fade" id="deleteModalCollege" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="deleteCollegeForm">
                            @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete College from My Colleges</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="text-center strong text-red">Are you sure you want to delete this college from My Colleges?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <h5>No colleges added. Add now by clicking <a href="/available/colleges">here.</a></h5>
                @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleDelete(college_id, user_id)
        {
            var form = document.getElementById('deleteCollegeForm')
                form.action='/college/' + college_id + '/delete/' + user_id
            $('#deleteModalCollege').modal('show')

        }
    
    </script>
@endsection
