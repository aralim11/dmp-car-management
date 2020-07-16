@extends('admin.app')

@section('title', 'Requisition')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('super.requisition.index') }}"><button class="btn btn-outline-danger btn-sm float-right">Back</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('super.requisition.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="car_id" class="col-md-4 col-form-label text-md-right">{{ __('Issued Car') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('car_id') is-invalid @enderror" id="car_id" name="car_id">
                                        <option value="" >Select Car</option>
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
                                <label for="requisition_type" class="col-md-4 col-form-label text-md-right">{{ __('Requisition Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('requisition_type') is-invalid @enderror" id="requisition_type" name="requisition_type" readonly required>
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
                                    <input id="start_date" type="date" value="{{ date('Y-m-d', strtotime(str_replace('-','/', $data->start_date))) }}" class="form-control @error('start_date') is-invalid @enderror" name="start_date" readonly required autocomplete="start_date">

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
                                    <input id="end_date" type="date" value="{{ date('Y-m-d', strtotime(str_replace('-','/', $data->end_date))) }}" class="form-control @error('end_date') is-invalid @enderror" name="end_date" readonly required autocomplete="end_date">

                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" readonly name="status" required>
                                        <option value="0" @if($data->status == 0){{'selected'}}@endif>Accept</option>
                                        <option value="1" @if($data->status == 1){{'selected'}}@endif>Pending</option>
                                    </select>

                                    @error('user_role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="btnSubmit" type="submit" class="btn btn-primary" disabled>
                                        {{ __('Save User Info') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#car_id").change(function(e) {
                var car_id = $("#car_id").val();

                $.ajax({
                    url: '{{ URL::to('check-car') }}',
                    data: {'car_id' : car_id},
                    type: 'GET',
                    success: function (response) {

                        if(response == 1)
                        {
                            alert("Car Already Assigned for Another Car!!");
                            $('#car_id').val('');
                            $('#status').val('1');
                            $("#btnSubmit").attr("disabled", true);

                        } else if (response == 0){

                            $('#status').val('0');
                            $('#btnSubmit').attr("disabled", false);

                        }
                    },
                });
            });
        });
    </script>
@endsection
