<?php
    $current_year = '2077';
    $college_name_array = explode(' ', $college->name);
    $first_char = $college_name_array[0][0];
    $second_char = $college_name_array[1][0];
    $symbol_number_array[0] = $first_char.$second_char;
    $symbol_number = $current_year.implode('', $symbol_number_array).$college->id.$profile->user_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Card</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bodyColor{
            background-color: white;
        }
    </style>
</head>
<body class="bodyColor">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card" style="width: 60rem;">
                    <div class="card-header text-center">
                        <h4><strong>{{$college->name}}</strong></h4>
                        <h6>{{$college->address}}</h6>
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            <strong> Admit Card </strong>
                        </div><br>
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Symbol no.</strong></td>
                                            <td>{{$symbol_number}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Application ID</strong></td>
                                            <td>
                                                @foreach($profile->applications as $myCollege)
                                                    @if($myCollege->pivot->application_id == $college->id)
                                                        {{$myCollege->pivot->unique_id}}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td>{{$profile->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td>{{$profile->address}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth (AD)</strong></td>
                                            <td>{{$profile->dob}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Exam Centre</strong></td>
                                            <td>{{$college->name}} <br> <h6>{{$college->address}} </h6></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <div class="float-right">
                                    <img src="/images/your_photos/{{$profile->your_photo}}" alt="{{$profile->your_photo}}"
                                    style="border: 1px solid #ddd;
                                            border-radius: 4px;
                                            width: 150px;"> <br>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="float-right">
                            <a href="{{ route('pdfview',['download'=>'pdf']) }}"><button class="btn btn-dark">Download PDF</button></a>
                        </div> -->
                        <div>
                            <label>Please print this page for your admit card.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

