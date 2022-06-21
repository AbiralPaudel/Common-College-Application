@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ "Edit college ".$college->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('college.update', $college->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('College Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $college->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $college->address }}" placeholder="(Format: Municipality/VDC - wardNo, District)" autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $college->phone_number }}" autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_of_seats" class="col-md-4 col-form-label text-md-right">{{ __('Number of seats') }}</label>

                            <div class="col-md-6">
                                <input id="no_of_seats" type="number" class="form-control @error('no_of_seats') is-invalid @enderror" name="no_of_seats" value="{{ $college->no_of_seats }}" autocomplete="no_of_seats">

                                @error('no_of_seats')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Specialities') }}</label>
                                <?php  
                                    $arrayOfSpeciality = explode(',', $college->speciality);
                                ?>
                            <div class="col-md-6">
                                <input id="speciality1" type="checkbox" name="speciality[]" value="Academic"
                                    <?php foreach($arrayOfSpeciality as $speciality){
                                        echo ($speciality == "Academic")?"checked":"";
                                    } ?>
                                ><label for="speciality1"> Academic </label><br>
                                <input id="speciality2" type="checkbox" name="speciality[]" value="Sports"
                                    <?php foreach($arrayOfSpeciality as $speciality){
                                        echo ($speciality == "Sports")?"checked":"";
                                    } ?>
                                ><label for="speciality2"> Sports </label><br>
                                <input id="speciality3" type="checkbox" name="speciality[]" value="ECA"
                                    <?php foreach($arrayOfSpeciality as $speciality){
                                        echo ($speciality == "ECA")?"checked":"";
                                    } ?>
                                ><label for="speciality3"> ECA </label><br>
                                <input id="speciality4" type="checkbox" name="speciality[]" value="Leadership"
                                    <?php foreach($arrayOfSpeciality as $speciality){
                                        echo ($speciality == "Leadership")?"checked":"";
                                    } ?>
                                ><label for="speciality4"> Leadership </label>
                            @error('speciality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ $college->description }}</textarea>

                                @error('description')
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
