@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Your Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option value="Male" {{ ($profile->gender) == "Male"?"selected":"" }}>Male</option>
                                        <option value="Female" {{ ( $profile->gender) == "Female"?"selected":"" }}>Female</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address" placeholder="(Format: Municipality/VDC - wardNo, District)" value="{{$profile->address}}" autofocus >

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth (A.D.)') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" autocomplete="dob" value="{{$profile->dob}}" autofocus>

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" autocomplete="phone_number" value="{{$profile->phone_number}}" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="your_photo" class="col-md-4 col-form-label text-md-right">{{ __('Your Photo') }}</label>

                                <div class="col-md-6">

                                    <div class="float-right">
                                        <a target="_blank" href="/images/your_photos/{{$profile->your_photo}}">
                                            <img src="/images/your_photos/{{$profile->your_photo}}" alt="{{$profile->your_photo}}"
                                            style="border: 1px solid #ddd;
                                                    border-radius: 4px;
                                                    padding: 5px;
                                                    width: 150px;">
                                        </a>
                                    </div>

                                    <input type="file" name="your_photo" id="your_photo" onchange="loadFile1(event)" class="form-control @error('your_photo') is-invalid @enderror">
                                    New Uploaded photo: <img id="output1" class = "img-fluid"/>
                                    <script>
                                        var loadFile1 = function(event) {
                                            var your_photo = document.getElementById('output1');
                                            your_photo.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>

                                    @error('your_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="citizenship_front" class="col-md-4 col-form-label text-md-right">{{ __('Citizenship Front') }}</label>

                                <div class="col-md-6">

                                    <div class="float-right">
                                        <a target="_blank" href="/images/citizenship_fronts/{{$profile->citizenship_front}}">
                                            <img src="/images/citizenship_fronts/{{$profile->citizenship_front}}" alt="{{$profile->citizenship_front}}"
                                            style="border: 1px solid #ddd;
                                                    border-radius: 4px;
                                                    padding: 5px;
                                                    width: 150px;">
                                        </a>
                                    </div>


                                    <input type="file" name="citizenship_front" id="citizenship_front" onchange="loadFile2(event)" class="form-control @error('citizenship_front') is-invalid @enderror">
                                    New Uploaded photo: <img id="output2" class = "img-fluid"/>
                                    <script>
                                        var loadFile2 = function(event) {
                                            var citizenship_front = document.getElementById('output2');
                                            citizenship_front.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>

                                    @error('citizenship_front')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="citizenship_back" class="col-md-4 col-form-label text-md-right">{{ __('Citizenship Back') }}</label>

                                <div class="col-md-6">
                                    <div class="float-right">
                                        <a target="_blank" href="/images/citizenship_backs/{{$profile->citizenship_back}}">
                                            <img src="/images/citizenship_backs/{{$profile->citizenship_back}}" alt="{{$profile->citizenship_back}}"
                                            style="border: 1px solid #ddd;
                                                    border-radius: 4px;
                                                    padding: 5px;
                                                    width: 150px;">
                                        </a>
                                    </div>
                                    <input type="file" name="citizenship_back" id="citizenship_back" onchange="loadzFile4(event)" class="form-control @error('citizenship_back') is-invalid @enderror">
                                    New Uploaded photo: <img id="output4" class = "img-fluid"/>
                                    <script>
                                        var loadFile4 = function(event) {
                                            var citizenship_back = document.getElementById('output4');
                                            citizenship_back.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>

                                    @error('citizenship_back')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="school_name" class="col-md-4 col-form-label text-md-right">{{ __('School Name') }}</label>

                                <div class="col-md-6">
                                    <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" autocomplete="school_name" value="{{$profile->school_name}}" autofocus>

                                    @error('school_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="marksheet_photo" class="col-md-4 col-form-label text-md-right">{{ __('Marksheet copy') }}</label>

                                <div class="col-md-6">
                                    <div class="float-right">
                                        <a target="_blank" href="/images/marksheet_photos/{{$profile->marksheet_photo}}">
                                            <img src="/images/marksheet_photos/{{$profile->marksheet_photo}}" alt="{{$profile->marksheet_photo}}"
                                            style="border: 1px solid #ddd;
                                                    border-radius: 4px;
                                                    padding: 5px;
                                                    width: 150px;">
                                        </a>
                                    </div>
                                    <input type="file" name="marksheet_photo" id="marksheet_photo" onchange="loadFile3(event)" class="form-control @error('marksheet_photo') is-invalid @enderror">
                                    New Uploaded photo: <img id="output3" class = "img-fluid"/>
                                    <script>
                                        var loadFile3 = function(event) {
                                            var marksheet_photo = document.getElementById('output3');
                                            marksheet_photo.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>

                                    @error('marksheet_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Your Interest of College Speciality') }}</label>

                                <div class="col-md-6">
                                <?php  
                                    $arrayOfInterest = explode(',', $profile->interest);
                                ?>                                    
                                    <input type="checkbox" name="interest[]" value="Sports" id="interest1"
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "Sports")?"checked":"";
                                    } ?>
                                    ><label for="interest1"> Sports </label><br>
                                    
                                    <input type="checkbox" name="interest[]" value="ECA" id="interest2"
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "ECA")?"checked":"";
                                    } ?>
                                    ><label for="interest2"> ECA </label><br>
                                    
                                    <input type="checkbox" name="interest[]" value="Leadership" id="interest3"
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "Leadership")?"checked":"";
                                    } ?>
                                    ><label for="interest3"> Leadership </label><br>

                                    @error('interest')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
