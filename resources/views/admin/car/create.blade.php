@extends('admin.app')

@section('title', 'Car Info')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.car.index') }}"><button class="btn btn-outline-danger btn-sm float-right">Back</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('super.car.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="number_plate" class="col-md-4 col-form-label text-md-right">{{ __('Car Number') }}</label>

                                <div class="col-md-6">
                                    <input id="number_plate" type="text" class="form-control @error('number_plate') is-invalid @enderror" name="number_plate" value="{{ old('number_plate') }}" required autocomplete="number_plate" autofocus placeholder="Enter Car Number">

                                    @error('number_plate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="engine_number" class="col-md-4 col-form-label text-md-right">{{ __('Engine Number') }}</label>

                                <div class="col-md-6">
                                    <input id="engine_number" type="text" class="form-control @error('engine_number') is-invalid @enderror" name="engine_number" value="{{ old('engine_number') }}" required autocomplete="engine_number" placeholder="Enter Engine Number">

                                    @error('engine_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fuel_type" class="col-md-4 col-form-label text-md-right">{{ __('Fuel Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('fuel_type') is-invalid @enderror" id="fuel_type" name="fuel_type" required>
                                        <option value="" >Select Fuel Type</option>
                                        <option value="1">Petrol</option>
                                        <option value="2">Diesel</option>
                                        <option value="3">Octane</option>
                                        <option value="4">Kerosene</option>
                                        <option value="5">GAS</option>
                                    </select>

                                    @error('fuel_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fuel_consumption" class="col-md-4 col-form-label text-md-right">{{ __('Fuel Consumption') }}</label>

                                <div class="col-md-6">
                                    <input id="fuel_consumption" type="text" class="form-control @error('fuel_consumption') is-invalid @enderror" name="fuel_consumption" required autocomplete="fuel_consumption" placeholder="Enter Fuel Consumption">

                                    @error('fuel_consumption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_type" class="col-md-4 col-form-label text-md-right">{{ __('Car Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('car_type') is-invalid @enderror" id="car_type" name="car_type" required>
                                        <option value="" >Select Car Type</option>
                                        <option value="1">Pickup Truck</option>
                                        <option value="2">Sport Utility Vehicle</option>
                                        <option value="3">Mini-Van</option>
                                        <option value="4">Station Wagon</option>
                                        <option value="5">Sedan</option>
                                    </select>

                                    @error('car_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="site_number" class="col-md-4 col-form-label text-md-right">{{ __('Site Number') }}</label>

                                <div class="col-md-6">
                                    <input id="site_number" type="text" class="form-control @error('site_number') is-invalid @enderror" name="site_number" required autocomplete="site_number" placeholder="Enter Site Number">

                                    @error('site_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="door_number" class="col-md-4 col-form-label text-md-right">{{ __('Door Number') }}</label>

                                <div class="col-md-6">
                                    <input id="door_number" type="text" class="form-control @error('door_number') is-invalid @enderror" name="door_number" required autocomplete="door_number" placeholder="Enter Door Number">

                                    @error('door_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_weight" class="col-md-4 col-form-label text-md-right">{{ __('Car Weight') }}</label>

                                <div class="col-md-6">
                                    <input id="car_weight" type="text" class="form-control @error('car_weight') is-invalid @enderror" name="car_weight" required autocomplete="car_weight" placeholder="Enter Car Weight">

                                    @error('car_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reg_date" class="col-md-4 col-form-label text-md-right">{{ __('Registration Date') }}</label>

                                <div class="col-md-6">
                                    <input id="reg_date" type="date" class="form-control @error('reg_date') is-invalid @enderror" name="reg_date" required autocomplete="reg_date">

                                    @error('reg_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exp_date" class="col-md-4 col-form-label text-md-right">{{ __('Expire Date') }}</label>

                                <div class="col-md-6">
                                    <input id="exp_date" type="date" class="form-control @error('exp_date') is-invalid @enderror" name="exp_date" required autocomplete="exp_date">

                                    @error('exp_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Car Info') }}
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
