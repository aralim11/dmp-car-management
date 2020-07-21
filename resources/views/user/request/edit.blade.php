@extends('user.app')

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

                                <div class="col-md-6 input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" value="{{ date('Y-m-d h:i A', strtotime(str_replace('-','/', $data->start_date))) }}" class="form-control datetimepicker-input @error('start_date') is-invalid @enderror" data-target="#datetimepicker1" name="start_date" required>

                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>

                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                                <div class="col-md-6 input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type="text" value="{{ date('Y-m-d h:i A', strtotime(str_replace('-','/', $data->end_date))) }}" class="form-control datetimepicker-input @error('end_date') is-invalid @enderror" data-target="#datetimepicker2" name="end_date" required autocomplete="end_date">

                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>

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
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="" >Select Cancel Status</option>
                                        <option value="3">Cancel</option>
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

    @push('js')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });

            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>
    @endpush
@endsection
