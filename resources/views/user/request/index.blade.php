@extends('user.app')

@section('title', 'Car Requisition')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')
                        <a href="{{ route('user.requisition.create') }}"><button class="btn btn-outline-primary btn-sm float-right">Add Requisition</button></a>
                        @if(session()->has('success_msg'))<span class="badge badge-success float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('success_msg') }}</span> @endif
                        @if(session()->has('delete_msg'))<span class="badge badge-danger float-right" style="margin-top: 1px; margin-right: 8px; padding: 8px; font-size: 11px;">{{ Session('delete_msg') }}</span> @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Requisition Type</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Requisition Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>@if($datas->requisition_type == 1){{ 'Permanent' }}@elseif($datas->requisition_type == 2){{ 'Official' }}@elseif($datas->requisition_type == 3){{ 'Rental' }}@elseif($datas->requisition_type == 4){{ 'For Guest' }}@endif</td>
                                        <td>{{ $datas->start_date }}</td>
                                        <td>{{ $datas->end_date }}</td>
                                        <td>{{ $datas->created_at }}</td>
                                        <td>
                                            @if($datas->status == 0) <h5><span class="badge badge-success">Accept</span></h5>
                                            @elseif($datas->status == 1) <h5><span class="badge badge-warning">Pending</span></h5>
                                            @elseif($datas->status == 2) <h5><span class="badge badge-info">Late</span></h5>
                                            @elseif($datas->status == 3) <h5><span class="badge badge-danger">Cancel</span></h5>@endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('user.requisition.edit', $datas->id) }}"><button class="btn btn-outline-primary btn-sm" @if($datas->status == 0){{ 'disabled' }}@elseif($datas->status == 3){{ 'disabled' }}@endif>Edit</button></a>&nbsp;&nbsp;
                                                <a href="{{ route('user.requisition.show', $datas->id) }}"><button class="btn btn-outline-secondary btn-sm">View</button></a>&nbsp;&nbsp;
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
