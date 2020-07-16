@extends('admin.app')

@section('title', 'Driver')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.driver.index') }}"><button class="btn btn-outline-danger btn-sm float-right">Back</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('super.driver.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="driver_id" class="col-md-4 col-form-label text-md-right">{{ __('Driver ID') }}</label>

                                <div class="col-md-6">
                                    <input id="driver_id" type="text" class="form-control @error('driver_id') is-invalid @enderror" name="driver_id" value="{{ old('driver_id') }}" required autocomplete="driver_id" autofocus placeholder="Enter Driver ID">

                                    @error('driver_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="driver_name" class="col-md-4 col-form-label text-md-right">{{ __('Driver Name') }}</label>

                                <div class="col-md-6">
                                    <input id="driver_name" type="text" class="form-control @error('driver_name') is-invalid @enderror" name="driver_name" value="{{ old('driver_name') }}" required autocomplete="driver_name" autofocus placeholder="Enter Driver Name">

                                    @error('driver_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_number" class="col-md-4 col-form-label text-md-right">{{ __('License Number') }}</label>

                                <div class="col-md-6">
                                    <input id="license_number" type="text" class="form-control @error('license_number') is-invalid @enderror" name="license_number" value="{{ old('license_number') }}" required autocomplete="license_number" placeholder="Enter License Number">

                                    @error('license_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="phone" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number" placeholder="Enter Phone Number">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_issue_date" class="col-md-4 col-form-label text-md-right">{{ __('License Issue Date') }}</label>

                                <div class="col-md-6">
                                    <input id="license_issue_date" type="date" class="form-control @error('license_issue_date') is-invalid @enderror" name="license_issue_date" required autocomplete="license_issue_date">

                                    @error('license_issue_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_exp_date" class="col-md-4 col-form-label text-md-right">{{ __('License Expire Date') }}</label>

                                <div class="col-md-6">
                                    <input id="license_exp_date" type="date" class="form-control @error('license_exp_date') is-invalid @enderror" name="license_exp_date" required autocomplete="license_exp_date">

                                    @error('license_exp_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" required autocomplete="picture">

                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Driver Info') }}
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
