@extends('admin.app')

@section('title', 'Car Edit')

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
                        <form method="POST" action="{{ route('super.car.update', $data->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="driver_id" class="col-md-4 col-form-label text-md-right">{{ __('Assigned Driver') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('driver_id') is-invalid @enderror" id="driver_id" name="driver_id">
                                        <option value="" >Select Assigned Driver</option>
                                        @foreach($driver as $drivers)
                                            <option value="{{ $drivers->id }}" @if($drivers->id == $data->driver_id){{ 'selected' }} @endif>{{ $drivers->driver_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('driver_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_id" class="col-md-4 col-form-label text-md-right">{{ __('Car ID') }}</label>

                                <div class="col-md-6">
                                    <input id="car_id" type="text" class="form-control @error('car_id') is-invalid @enderror" name="car_id" value="{{ old('car_id') }} {{ $data->car_id }}" required autocomplete="car_id" autofocus placeholder="Enter Car ID">

                                    @error('car_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_plate" class="col-md-4 col-form-label text-md-right">{{ __('Car Number') }}</label>

                                <div class="col-md-6">
                                    <input id="number_plate" type="text" class="form-control @error('number_plate') is-invalid @enderror" name="number_plate" value="{{ old('number_plate') }} {{ $data->number_plate }}" required autocomplete="number_plate" autofocus placeholder="Enter Car Number">

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
                                    <input id="engine_number" type="text" class="form-control @error('engine_number') is-invalid @enderror" name="engine_number" value="{{ old('engine_number') }} {{ $data->engine_number }}" required autocomplete="engine_number" placeholder="Enter Engine Number">

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
                                        <option value="1" @if($data->car_type == 1){{ 'selected' }} @endif>Petrol</option>
                                        <option value="2" @if($data->car_type == 2){{ 'selected' }} @endif>Diesel</option>
                                        <option value="3" @if($data->car_type == 3){{ 'selected' }} @endif>Octane</option>
                                        <option value="4" @if($data->car_type == 4){{ 'selected' }} @endif>Kerosene</option>
                                        <option value="5" @if($data->car_type == 5){{ 'selected' }} @endif>GAS</option>
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
                                    <input id="fuel_consumption" type="text" class="form-control @error('fuel_consumption') is-invalid @enderror" value="{{ old('fuel_consumption') }} {{ $data->fuel_consumption }}" name="fuel_consumption" required autocomplete="fuel_consumption" placeholder="Enter Fuel Consumption">

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
                                        <option value="1" @if($data->car_type == 1){{ 'selected' }} @endif>Pickup Truck</option>
                                        <option value="2" @if($data->car_type == 2){{ 'selected' }} @endif>Sport Utility Vehicle</option>
                                        <option value="3" @if($data->car_type == 3){{ 'selected' }} @endif>Mini-Van</option>
                                        <option value="4" @if($data->car_type == 4){{ 'selected' }} @endif>Station Wagon</option>
                                        <option value="5" @if($data->car_type == 5){{ 'selected' }} @endif>Sedan</option>
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
                                    <input id="site_number" type="text" class="form-control @error('site_number') is-invalid @enderror" value="{{ old('site_number') }} {{ $data->site_number }}" name="site_number" required autocomplete="site_number" placeholder="Enter Site Number">

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
                                    <input id="door_number" type="text" class="form-control @error('door_number') is-invalid @enderror" value="{{ old('door_number') }} {{ $data->door_number }}" name="door_number" required autocomplete="door_number" placeholder="Enter Door Number">

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
                                    <input id="car_weight" type="text" class="form-control @error('car_weight') is-invalid @enderror" value="{{ old('car_weight') }} {{ $data->car_weight }}" name="car_weight" required autocomplete="car_weight" placeholder="Enter Car Weight">

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
                                    <input id="reg_date" type="date" class="form-control @error('reg_date') is-invalid @enderror" value="{{ date('Y-m-d', strtotime(str_replace('-','/', $data->reg_date))) }}" name="reg_date" required autocomplete="reg_date">

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
                                    <input id="exp_date" type="date" class="form-control @error('exp_date') is-invalid @enderror" value="{{ date('Y-m-d', strtotime(str_replace('-','/', $data->exp_date))) }}" name="exp_date" required autocomplete="exp_date">

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
                                        {{ __('Update Car Info') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $("#driver_id").change(function(e) {
                var driver_id = $("#driver_id").val();

                $.ajax({
                    url: '{{ URL::to('check-driver') }}',
                    data: {'driver_id' : driver_id},
                    type: 'GET',
                    success: function (response) {
                        if(response == 1)
                        {
                            alert("Driver Already Assigned for Another Car!!");
                            $('#driver_id').val('');
                        }
                    },
                });
            });
        });
    </script>
@endpush

@endsection
