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
                        <form method="POST" action="{{ route('super.maintenance.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="car_id" class="col-md-4 col-form-label text-md-right">{{ __('Issued Car') }}</label>

                                <div class="col-md-6">

                                    <select class="form-control @error('car_id') is-invalid @enderror" id="car_id" name="car_id">
                                        <option value="">Select Car</option>
                                        @foreach($car as $cars)
                                            <option value="{{ $cars->id }}">{{ $cars->car_id }} - {{ $cars->engine_number }}</option>
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
                                    <select class="form-control @error('main_type') is-invalid @enderror" id="main_type" name="main_type" required>
                                        <option value="" >Select Maintenance Type</option>
                                        <option value="1">Paper Work</option>
                                        <option value="2">Engine Problem</option>
                                        <option value="3">Electrical Problem</option>
                                        <option value="4">Oil/Air Filter Change</option>
                                        <option value="5">Brake Problem</option>
                                        <option value="6">Lights Problem</option>
                                        <option value="7">Gear Problem</option>
                                        <option value="8">Gear Oil Change</option>
                                        <option value="9">Car Interior</option>
                                        <option value="10">Other</option>
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
                                        {{ __('Save Maintenance Info') }}
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
