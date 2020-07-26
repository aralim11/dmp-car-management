@extends('admin.app')

@section('title', 'Maintenance')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.maintenance.index') }}"><button class="btn btn-outline-danger btn-sm float-right">Back</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('super.maintenance.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="car_id" class="col-md-4 col-form-label text-md-right">{{ __('Issued Car') }}</label>

                                <div class="col-md-6">

                                    <select class="form-control @error('car_id') is-invalid @enderror" id="car_id" name="car_id" readonly>
                                        <option value="">Select Car</option>
                                        @foreach($car as $cars)
                                            <option value="{{ $cars->id }}" @if($cars->id == $data->car_id){{'selected'}}@endif>{{ $cars->car_id }} - {{ $cars->engine_number }}</option>
                                        @endforeach
                                    </select>

                                    @error('user_role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="main_type" class="col-md-4 col-form-label text-md-right">{{ __('Maintenance Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('main_type') is-invalid @enderror" id="main_type" name="main_type" readonly required>
                                        <option value="" >Select Maintenance Type</option>
                                        <option value="1" @if($data->main_type == 1){{'selected'}}@endif>Paper Work</option>
                                        <option value="2" @if($data->main_type == 2){{'selected'}}@endif>Engine Problem</option>
                                        <option value="3" @if($data->main_type == 3){{'selected'}}@endif>Electrical Problem</option>
                                        <option value="4" @if($data->main_type == 4){{'selected'}}@endif>Oil/Air Filter Change</option>
                                        <option value="5" @if($data->main_type == 5){{'selected'}}@endif>Brake Problem</option>
                                        <option value="6" @if($data->main_type == 6){{'selected'}}@endif>Lights Problem</option>
                                        <option value="7" @if($data->main_type == 7){{'selected'}}@endif>Gear Problem</option>
                                        <option value="8" @if($data->main_type == 8){{'selected'}}@endif>Gear Oil Cange</option>
                                        <option value="9" @if($data->main_type == 9){{'selected'}}@endif>Car Interior</option>
                                        <option value="10" @if($data->main_type == 10){{'selected'}}@endif>Other</option>
                                    </select>

                                    @error('requisition_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        @if($data->status == 0)
                                            <option value="1">Release</option>
                                        @else
                                            <option value="0">Accept</option>
                                        @endif
                                    </select>

                                    @error('requisition_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if($data->status == 0)
                                            {{ __('Release Car') }}
                                        @elseif($data->status == 2)
                                            {{ __('Accept Request') }}
                                        @endif
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
