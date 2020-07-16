@extends('admin.app')

@section('title', 'Requisition')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('user.requisition.index') }}"><button class="btn btn-outline-danger btn-sm float-right">Back</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.requisition.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="requisition_type" class="col-md-4 col-form-label text-md-right">{{ __('Requisition Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('requisition_type') is-invalid @enderror" id="requisition_type" name="requisition_type" required>
                                        <option value="" >Select Requisition Type</option>
                                        <option value="1" @if($data->requisition_type == 1){{ 'selected' }}@endif>Permanent</option>
                                        <option value="2" @if($data->requisition_type == 2){{ 'selected' }}@endif>Official</option>
                                        <option value="3" @if($data->requisition_type == 3){{ 'selected' }}@endif>Rental</option>
                                        <option value="4" @if($data->requisition_type == 4){{ 'selected' }}@endif>For Guest</option>
                                    </select>

                                    @error('requisition_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" value="{{ date('Y-m-d', strtotime(str_replace('-','/', $data->start_date))) }}" class="form-control @error('start_date') is-invalid @enderror" name="start_date" required autocomplete="start_date">

                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" value="{{ date('Y-m-d', strtotime(str_replace('-','/', $data->end_date))) }}" class="form-control @error('end_date') is-invalid @enderror" name="end_date" required autocomplete="end_date">

                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Requisition') }}
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
